<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Objective;
use App\Subject;
use Illuminate\Http\Request;
use SWAL;

class ObjectiveController extends Controller
{
    public function getAllObjective()
    {
        $allObj = Objective::all();
        return $allObj->toJson();
    }

    public function getOneObjective($id)
    {
        $oneObject = Objective:: find($id);
        return $oneObject;
    }

    public function getObjectiveInTopics($topic_id) 
    {
        $objectiveIntopic = Objective::where('topic_id',$topic_id)->get();
        return $objectiveIntopic->toJson();

    }
    
    public function deleteObjective($id)
    {
        $delObj = Objective::find($id);
        $delObj->delete();
        return $delObj;
    }

    public function storeObjective(Request $request)
    {
        //validation
        $validQuestion = $request->validate([
            
            'title' => 'required',
            'creditLoad' => 'required',
            'topic_id' => 'required',
            'subject_id' => 'required'
        ]);
        $existing = Objective::where('title', $validQuestion)->first();
       
        if($existing ){
             return response()->json($existing );

      }else{
        $storeQuestion = Objective::create($validQuestion);
        return $storeQuestion->toJson();
      }
        
    }

    public function getAllObjectiveInTopic($topicId)
    {
        $allObjectiveinTopic = Objective::where('topic_id', $topicId)->get();
        return $allObjectiveinTopic;        
    }

    public function getAllObjectiveInSubject($subjId)
    {
        //COMMENT: if $subjId is not found null ll be returned
        $allObjectiveinSubj = Subject::find($subjId)->objectives()->get();
        return $allObjectiveinSubj;        
    }
}

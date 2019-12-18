<?php

namespace App\Http\Controllers;

use App\Objective;
use App\Subject;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function getAllObjective()
    {
        $allObj = Objective::all();
        return $allObj;
    }

    public function getOneObjective($id)
    {
        $oneObject = Objective:: find($id);
        return $oneObject;
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

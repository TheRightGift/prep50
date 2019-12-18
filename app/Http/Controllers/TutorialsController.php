<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutorial;

class TutorialsController extends Controller
{
    //
    public function getAllTutorial()
    {

        $Tutorials = Tutorial::all();
        return $Tutorials;

    }
    public function getOneTutorial($id)
    {

        $oneTutorial = Tutorial::find($id);
        return $oneTutorial;

    }
    public function getTutorialInObj($obj_id)
    {

        $oneTutorial = Tutorial::where('objective_id',$obj_id)->get();
        return $oneTutorial;
    }
    public function updateTutorial($tutorial_id)
    {
        $updateTutorial = Tutorial::where('id', $tutorial_id)->first();

        $isDone = $updateTutorial->update($request->all());

        return response()->json($isDone);
    }
    public function createTutorial()
    {

    }
    public function deleteTutorial($ques_id)
    {
        $delTutorial = Tutorial::find($ques_id);
        $delTutorial->delete();
        return $delTutorial;
        
    }
}

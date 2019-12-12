<?php

namespace App\Http\Controllers;

use App\Objective;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function getAllObjective()
    {
        $allObj = Objective::all();
        return $allobj;
    }

    public function getOneObjective($id)
    {
        $oneObject = Objective:: find($id);
        return $oneObject;
    }

    public function getAllObjectiveInTopic($id)
    {
        $allObjectiveinTopic= Objective::where();
        return $allObjectiveinTopic;

        
    }
    public function getAllObjectiveInSubject($id)
    {
        $allObjectiveinSubj = Objective::where();
        return $allObjectiveinSubj;


        
    }
}

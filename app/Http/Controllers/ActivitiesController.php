<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activities;

class ActivitiesController extends Controller
{
    //
    public function CreateUserActivities()
    {

    }
    public function getAllActivities()
    {
        $activities = Activities::all();

    }
    public function getUserActivities($user_id)
    {
        $activities = Activities::find($user_id);

     }
    public function getusersActivities($object_id)
    {
        $activities = Activities::all($object_id);

    }
     public function editActivities()
    {
        $subject = Activities::find();
    }
    public function deleteActivities()
    {
        $activities = Activities::find();
        $activities->delete();

    }
}

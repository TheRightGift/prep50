<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ActivitiesController extends Controller
{
    //
    public function CreateUserActivities()
    {

    }
    public function getAllActivities()
    {
        $allActivities = Activity::all();
        return $allActivities;

    }
    public function getUserActivities($user_id)
    {
        $userActivities = Activity::where('user_id', $user_id)->get();
        return $userActivities;

     }
    public function getusersActivities($object_id)
    {
        $usersActivities = Activity::with('user')->where('objective_id', $object_id)->get();
        return $usersActivities;


    }
     public function editUserActivity(Request $request, $user_id, $obj_id)
    {
        $activity = Activity::where('user_id', $user_id)->where('objective_id', $obj_id)->first();

        $done = $activity->update($request->all());

        return response()->json($done);
        //$editActivities = $activiy->update($request->all());
        //return $userActivities = Activity::find($user_id);;
    }
    public function deleteActivities()
    {
        $delActivities = Activity::find();
        $delActivities->delete();
        return $delActivities;

    }
}

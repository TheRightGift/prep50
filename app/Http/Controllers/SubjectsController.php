<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\UserSubject;

class SubjectsController extends Controller
{
    //
    public function getAllSubject(){

        $subjects = Subject::all();
        return view('subjects.index')->with('subjects',$subjects);
    }

    public function getUserSubjects($user_id){
        return UserSubject::where('user_id', 1)->with(['activities' => function($query){ $query->orderBy('dateCompleted', 'desc')->limit(3); }])->get();
    }

    public function getOneSubject($id)
    {

        $subject = Subject::find($id);
        return view('subjects.show')->with('subject', $subject);
    }
    public function editSubject($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit')->with('subject', $subject);

    }
    public function deleteSubject($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('/subjects')->with('Success!!', 'Subject removed');

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    //
    public function getAllSubject(){

        $subjects = Subject::all();
        return view('subjects.index')->with('subjects',$subjects);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;
use App\UserSubject;
use SWAL;

class SubjectsController extends Controller
{
    //
    public function getAllSubject(){

        $subjects = Subject::all();
       return $subjects->toJson();
        // return view('subjects.Subject')->with('subjects',$subjects);
    }

    public function storeSubject(Request $request){
        $validData = $request->validate([
            'subj' => 'required'
        ]);
        $existing = Subject::where('subj', $validData)->first();
       
        if($existing ){
             return response()->json($existing );

      } else{
        $storeSubj = Subject::create($validData);
        return response()->json($storeSubj);
      } 
    }

    public function getUserSubjects($user_id){
        return UserSubject::where('user_id', $user_id)->with(['activities' => function($query){ $query->orderBy('dateCompleted', 'desc')->limit(3); }])->get();
    }

    public function getOneSubject($id){

        $oneSubject = Subject::find($id);
        return $oneSubject;
        // return view('subjects.show')->with('subject', $subject);
    }
    public function editSubject(Request $request, $id)
    {
        $editSubject = Subject::find($id)->first();

        $isDone = $editSubject->update($request->all());

        return response()->json($isDone);

        // return view('subjects.edit')->with('subject', $subject);

    }
    public function deleteSubject($id)
    {
        $delSubject = Subject::find($id);
        $delSubject->delete();
        return $delSubject ;
        // return redirect('/subjects')->with('Success!!', 'Subject removed');

    }

}

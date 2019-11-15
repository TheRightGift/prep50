<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller

{
    ///controller for edit topic
    public function edit(Topic $topic)
    {
        return view('edit', compact('topic'));
    }

    //controller for del topic 
    public function destroy(Topic $topic)
    {
        $topic->delete();
    }

    //getting all topics
    public function get()
    {
        return Request::all();
    }
    
    public function getOneTopic($id) {

        
    }

    public function getTopicsInSubjects($id) {

    }

    public function getIdInSubject(){

    } 

    
    public function getIdOfFirstTopicInSubject(){
        
    } 
    public function getIdOfLastTopicInSubject(){
        
    } 
}


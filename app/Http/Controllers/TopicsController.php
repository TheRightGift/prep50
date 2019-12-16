<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller

{
    ///controller for edit topic
    public function editTopic(Request $request, $id)
    {
        $editSubject = Subject::where('id', $id)->first();

        $isDone = $editSubject->update($request->all());

        return response()->json($isDone);
    }

    //controller for del topic 
    public function deleteTopic($id)
    {
        $delTopic = Subject::find($id);
        $delTopic->delete();
        return $delTopic;
    }

    //getting all topics
    public function getAllTopics()
    {
        $topic = Topic::all();
        return $topic;
    }
    
    public function getOneTopic($id) 
    {
        $oneTopic = Topic::find($id);
        return $oneTopic;
    }

    public function getTopicsInSubjects($id) 
    {
        $topicInSubject = Topic::where();
        return $topicInSubject;

    }

    public function getIdInSubject()
    {
        $idInSubject = Topic::where();
        return $idInSubject;


    } 

    
    public function getIdOfFirstTopicInSubject()
    {
        $firstidInSubject = Topic::where();
        return $firstidInSubject;
        
    } 
    public function getIdOfLastTopicInSubject()
    {
        $lastidInSubject = Topic::where();
        return $lastidInSubject;
        
    } 
}


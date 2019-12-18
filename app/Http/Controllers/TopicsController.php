<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller

{
    ///controller for edit topic
    public function updateTopic(Request $request, $id)
    {
        $editSubject = Subject::find( $id)->first();

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

    public function getTopicsInSubjects($subj_id) 
    {
        $topicInSubject = Topic::where('subj_id',$subj_id)->get();
        return $topicInSubject;

    }

    // public function getIdInSubject($id)
    // {
    //     $idInSubject = Topic::find();
    //     return $idInSubject;
    // } 

    
    public function getIdOfFirstTopicInSubject($subjId)
    {

        $firstidInSubject = Topic::where('subj_id', $subjId)->orderBy('id', 'asc')->limit(1)->get();
        return $firstidInSubject;
        
    } 
    public function getIdOfLastTopicInSubject($subjId)
    {
        $lastidInSubject = Topic::where('subj_id', $subjId)->orderBy('id', 'desc')->limit(1)->get();
        return $lastidInSubject;
        
    } 
}


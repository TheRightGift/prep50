<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Topic;
use App\Subject;
use Illuminate\Http\Request;
// use App\Http\Requests;
// use App\Http\Resources\TopicCollection as TopicResource;
use SWAL;

class TopicsController extends Controller

{

     //getting all topics
     public function getAllTopics()
     {
         $topics = Topic::all();
        //  return TopicResource::collection($topics);
         return $topics->toJson();
         
     }

    ///controller for edit topic
    public function updateTopic(Request $request, $id)
    {
        $editSubject = Topic::find( $id)->first();

        $isDone = $editSubject->update($request->all());

        return response()->json($isDone);
    }

    //controller for del topic 
    public function deleteTopic($id)
    {
        $delTopic = Topic::find($id);
        $delTopic->delete();
        return $delTopic;
    }

    public function getSubject()
    {
        $subjects = Subject::all();
         return $subjects->tojson();
    }

    public function storeTopic(Request $request)
    {
        //validation
        $validTopic = $request->validate([
            'topic' => 'required',
            'subj_id' => 'required'
        ]);
        $existing = Topic::where('topic', $validTopic)->first();
       
        if($existing ){
             return response()->json($existing );

      }else{
        $storeTopic = Topic::create($validTopic);
        
         return $storeTopic->toJson();
      }
    }

   
    public function getOneTopic($id) 
    {
        $oneTopic = Topic::find($id);
        return $oneTopic->toJson();
    }

    public function getTopicsInSubjects($subj_id) 
    {
        $topicInSubject = Topic::where('subj_id',$subj_id)->get();
        return $topicInSubject->toJson();

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


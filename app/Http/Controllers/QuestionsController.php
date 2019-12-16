<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Objective;

class QuestionsController extends Controller
{
    //
    public function getAllQuestions()
    {
        $questions = Question::all();
        return $questions;

    }
    public function getOneQuestion()
    {
        $onequestion = Question::find($id);
        return $onequestion;

    }
    public function getQuestionInObj($obj_id)
    {
        $onequestion = Question::where('obj_id',$obj_id)->get();
        return $onequestion;

    }
    public function updateQuestion($ques_id)
    {

        $updateQuestion = Question::where('id', $ques_id)->first();

        $isDone = $updateQuestion->update($request->all());

        return response()->json($isDone);
    }
    public function createQuestion()
    {

    }
    public function deleteQuestion($ques_id)
    {

        $delQuestion = Question::find($ques_id);
        $delQuestion->delete();
        return $delQuestion;
    }
}
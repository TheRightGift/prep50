<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Question;
use App\Objective;
use SWAL;

class QuestionsController extends Controller
{
    //
    public function getAllQuestions()
    {
        $questions = Question::all();
        return $questions->toJson();

    }
    public function getOneQuestion($id)
    {
        $onequestion = Question::find($id);
        return $onequestion;

    }
    public function getQuestionInObj($obj_id)
    {
        $onequestion = Question::where('objective_id',$obj_id)->get();
        return $onequestion;

    }
    public function updateQuestion(Request $request, $ques_id)
    {
        $request->validate([
            'topic_id' => 'required|bail',
            'objective_id' => 'required|bail',
            'explanation' => 'sometimes|required|bail',
            'quesYearNum' => 'required|bail',
            'quesYear' => 'required|bail',
            'passage' => 'sometimes',
            'fileName' => 'sometimes',
            'quesimg' => 'sometimes',
            'answer' => 'required|bail',
            'optionA' => 'required|bail',
            'optionB' => 'required|bail',
            'optionC' => 'required|bail',
            'optionD' => 'required|bail',
            'question' => 'required|bail',
            'fileName.*' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:20000',
            'quesimg.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $updateQuestion = Question::where('id', $ques_id)->first();

      if($request->hasFile('fileName' && 'quesimg'))
        {
            $file = $request->file('fileName');
            $file2 = $request->file('quesimg');
            $name = $file->getClientOriginalName();
            $name2 = $file->getClientOriginalName();
            $file->move(public_path('question_img/fileName'), $name);
            $file2->move(public_path('question_img/quesimgs'), $name2);

            $fileNameToDelete = public_path("question_img/fileName/{$book->fileName}");
            if (Book::exists($fileNameToDelete))
            {
                unlink($fileNameToDelete);
            }
            $imageToDelete = public_path("question_img/path/{$book->fileName}");
            if (Book::exists($imageToDelete))
            {
                unlink($imageToDelete);
            }
            $updateQuestion->fileName = $name;
            $updateQuestion->quesimg = $name2;
            $updateQuestion->topic_id =$request->topic_id;                       
            $updateQuestion->objective_id =$request->objective_id;                       
            $updateQuestion->explanation =$request->explanation;                       
            $updateQuestion->quesYearNum =$request->quesYearNum;                       
            $updateQuestion->quesYear =$request->quesYear;                       
            $updateQuestion->passage =$request->passage;                      
            $updateQuestion->answer =$request->answer;                       
            $updateQuestion->optionA =$request->optionA;                       
            $updateQuestion->optionB =$request->optionB;                       
            $updateQuestion->optionC =$request->optionC;                       
            $updateQuestion->optionD =$request->optionD;                       
            $updateQuestion->question =$request->question;

        }
        elseif ($request->hasFile('fileName')) 
        {
            $file = $request->file('fileName');
            $name = $file->getClientOriginalName();
            $file->move(public_path('question_img/fileName'), $name);
            $fileNameToDelete = public_path("question_img/fileName/{$book->path}");
            if (Book::exists($fileNameToDelete))
            {
                unlink($fileNameToDelete);
            }

            $updateQuestion->fileName = $name;
            $updateQuestion->topic_id =$request->topic_id;                       
            $updateQuestion->objective_id =$request->objective_id;                       
            $updateQuestion->explanation =$request->explanation;                       
            $updateQuestion->quesYearNum =$request->quesYearNum;                       
            $updateQuestion->quesYear =$request->quesYear;                       
            $updateQuestion->passage =$request->passage;                      
            $updateQuestion->answer =$request->answer;                       
            $updateQuestion->optionA =$request->optionA;                       
            $updateQuestion->optionB =$request->optionB;                       
            $updateQuestion->optionC =$request->optionC;                       
            $updateQuestion->optionD =$request->optionD;                       
            $updateQuestion->question =$request->question;

        }
        elseif ($request->hasFile('fileName')) 
        {
            $file2 = $request->file('quesimg');
            $name2 = $file2->getClientOriginalName();
            $file2->move(public_path('question_img/quesimg'), $name2);
            $imageToDelete = public_path("question/quesimg/{$book->quesimg}");
            if (Book::exists($imageToDelete))
            {
                unlink($imageToDelete);
            }
            
            $updateQuestion->quesimg = $name2;
            $updateQuestion->topic_id =$request->topic_id;                       
            $updateQuestion->objective_id =$request->objective_id;                       
            $updateQuestion->explanation =$request->explanation;                       
            $updateQuestion->quesYearNum =$request->quesYearNum;                       
            $updateQuestion->quesYear =$request->quesYear;                       
            $updateQuestion->passage =$request->passage;                      
            $updateQuestion->answer =$request->answer;                       
            $updateQuestion->optionA =$request->optionA;                       
            $updateQuestion->optionB =$request->optionB;                       
            $updateQuestion->optionC =$request->optionC;                       
            $updateQuestion->optionD =$request->optionD;                       
            $updateQuestion->question =$request->question;

        }
        else{
            $updateQuestion->topic_id =$request->topic_id;                       
            $updateQuestion->objective_id =$request->objective_id;                       
            $updateQuestion->explanation =$request->explanation;                       
            $updateQuestion->quesYearNum =$request->quesYearNum;                       
            $updateQuestion->quesYear =$request->quesYear;                       
            $updateQuestion->passage =$request->passage;                      
            $updateQuestion->answer =$request->answer;                       
            $updateQuestion->optionA =$request->optionA;                       
            $updateQuestion->optionB =$request->optionB;                       
            $updateQuestion->optionC =$request->optionC;                       
            $updateQuestion->optionD =$request->optionD;                       
            $updateQuestion->question =$request->question;
            // $updateQuestion->save();
        }
        $isDone = $updateQuestion->update($request->all());

        return response()->json($isDone);
    }
    public function storeQuestion(Request $request)
    {
        //validation
        $validQuestion = $request->validate([
            'topic_id' => 'required|bail',
            'objective_id' => 'required|bail',
            'explanation' => 'sometimes|required|bail',
            'quesYearNum' => 'required|bail',
            'quesYear' => 'required|bail',
            'passage' => 'sometimes',
            'fileName' => 'sometimes',
            'quesimg' => 'sometimes',
            'answer' => 'required|bail',
            'optionA' => 'required|bail',
            'optionB' => 'required|bail',
            'optionC' => 'required|bail',
            'optionD' => 'required|bail',
            'question' => 'required|bail',
            'fileName.*' => 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:20000',
            'quesimg.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);  
        $existing = Question::where('question', $validQuestion)->first();
       
        if($existing ){
             return response()->json($existing );

      }
        else{
            
            $input = $request->all();
            // if($request->has('fileName')){
            //    $input['fileName'] = $request->fileName->getClientOriginalName();
            //    $request->fileName->move(public_path('question_img/fileName'), $input['fileName']);
            // }
            if($request->hasFile('fileName') &&! empty($request->fileName)){
                $input['fileName'] = $request->fileName->getClientOriginalName();
                $request->fileName->move(public_path('question_img/fileName'), $input['fileName']);
            }
            if($request->hasFile('quesimg') &&! empty($request->quesimg)){
                $input['quesimg'] = Str::slug($request->name).'.'.$input['quesimg']->getClientOriginalExtension() ;
                \Image::make($request->file('quesimg'))->resize(100, 110)->save(public_path('question_img/quesimgs/').$input['quesimg']);
                // $request->quesimg->move(public_path('question_img/quesimgs/'), $input['quesimg']);
            }
           

            $storeQuestion = Question::create($validQuestion);
         return $storeQuestion->toJson();
        }
        
    }
    public function deleteQuestion($ques_id)
    {

        $delQuestion = Question::find($ques_id);
        $delQuestion->delete();
        return $delQuestion;
    }
}
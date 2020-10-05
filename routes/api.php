<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('alert/{AlertType}','Api/sweetalertController@alert')->name('alert');

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

// Subject controller route
Route::get('/subject', 'Api\SubjectsController@getAllSubject');
Route::post('/createSubject', 'Api\SubjectsController@storeSubject');
Route::get('/subject/{user_id}', 'Api\SubjectsController@getUserSubjects');
Route::get('/subject/{id}', 'Api\SubjectsController@getOneSubject');
Route::put('/updateSubject/{id}', 'Api\SubjectsController@editSubject');
Route::delete('/subject/{id}', 'Api\SubjectsController@deleteSubject');

// Topics controller route
Route::get('/topic', 'Api\TopicsController@getAllTopics');
Route::post('/createTopic', 'Api\TopicsController@storeTopic');
Route::delete('/delTopic/{id}', 'Api\TopicsController@deleteTopic');
Route::get('/onetopic/{id}', 'Api\TopicsController@getOneTopic');
Route::get('/TopicsInSubjects/{objective_id}', 'Api\TopicsController@getTopicsInSubjects');
Route::put('/updatetopic/{topic_id}', 'Api\TopicsController@updateTopic');
Route::get('/IdOfFirstTopicInSubject/{subj_id}', 'Api\TopicsController@getIdOfFirstTopicInSubject');
Route::get('/IdOfLastTopicInSubject/{subj_id}', 'Api\TopicsController@getIdOfLastTopicInSubject');

// // Activities controller route
Route::get('/activities', 'Api\ActivitiesController@getAllActivities');
Route::get('/userActivities/{user_id}', 'Api\ActivitiesController@getUserActivities');
Route::get('/activities/{object_id}', 'Api\ActivitiesController@getusersActivities');
Route::put('/updateUserActivity/{user_id}/{obj_id}', 'Api\ActivitiesController@editUserActivity');

//    Objective controller route
Route::get('/objective', 'Api\ObjectiveController@getAllObjective');  
Route::post('/createObjective', 'Api\ObjectiveController@storeObjective');
Route::get('/Oneobjective/{id}', 'Api\ObjectiveController@getOneObjective');
Route::get('/objectiveInTopic/{topic_id}', 'Api\ObjectiveController@getObjectiveInTopics');
Route::get('/objectiveAllinTopic/{topic_id}', 'Api\ObjectiveController@getAllObjectiveInTopic'); 
Route::get('/getAllObjectiveInSubject/{subject_id}', 'Api\ObjectiveController@getAllObjectiveInSubject');
Route::delete('/delObjective/{id}', 'Api\ObjectiveController@deleteObjective');

// Tutorial controller Route
Route::get('/tutorial', 'Api\TutorialsController@getAllTutorial');
Route::get('/onetutorial/{id}', 'Api\TutorialsController@getOneTutorial');
Route::get('/TutorialInObj/{objective_id}', 'Api\TutorialsController@getTutorialInObj');
Route::put('/updatetutorial/{content}/{objective_id}', 'Api\TutorialsController@updateTutorial');

// Question controller route

Route::get('/question', 'Api\QuestionsController@getAllQuestions');
Route::post('/createQuestion', 'Api\QuestionsController@storeQuestion');
Route::get('/onequestion/{id}', 'Api\QuestionsController@getOneQuestion');
Route::get('/QuestionInObj/{objective_id}', 'Api\QuestionsController@getQuestionInObj');
Route::put('/updateQuestion/{question_id}', 'Api\QuestionsController@updateQuestion');



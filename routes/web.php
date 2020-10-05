<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
/*/ Subject controller route
Route::get('/subject', 'SubjectsController@getAllSubject');
Route::get('/subject/{user_id}', 'SubjectsController@getUserSubjects');
Route::get('/subject/{id}', 'SubjectsController@getOneSubject');
Route::put('/updateSubject/{id}', 'SubjectsController@editSubject');
Route::delete('/subject/{id}', 'SubjectsController@deleteSubject');

// // Activities controller route
Route::get('/activities', 'ActivitiesController@getAllActivities');
Route::get('/userActivities/{user_id}', 'ActivitiesController@getUserActivities');
Route::get('/activities/{object_id}', 'ActivitiesController@getusersActivities');
Route::put('/updateUserActivity/{user_id}/{obj_id}', 'ActivitiesController@editUserActivity');

//    Objective controller route
Route::get('/objective', 'ObjectiveController@getAllObjective');  
Route::get('/Oneobjective/{id}', 'ObjectiveController@getOneObjective');
Route::get('/objectiveAllinTopic/{topic_id}', 'ObjectiveController@getAllObjectiveInTopic'); 
Route::get('/getAllObjectiveInSubject/{subject_id}', 'ObjectiveController@getAllObjectiveInSubject');

// Tutorial controller Route
Route::get('/tutorial', 'TutorialsController@getAllTutorial');
Route::get('/onetutorial/{id}', 'TutorialsController@getOneTutorial');
Route::get('/TutorialInObj/{objective_id}', 'TutorialsController@getTutorialInObj');
Route::put('/updatetutorial/{content}/{objective_id}', 'TutorialsController@updateTutorial');

// Question controller route

Route::get('/question', 'QuestionsController@getAllQuestions');
Route::get('/onequestion/{id}', 'QuestionsController@getOneQuestion');
Route::get('/QuestionInObj/{objective_id}', 'QuestionsController@getQuestionInObj');
Route::put('/updateQuestion/{objective_id}', 'QuestionsController@updateQuestion');

// Topics controller route
Route::get('/topic', 'TopicsController@getAllTopics');
Route::get('/onetopic/{id}', 'TopicsController@getOneTopic');
Route::get('/TopicsInSubjects/{objective_id}', 'TopicsController@getTopicsInSubjects');
Route::put('/updatetopic/{topic_id}', 'TopicsController@updateTopic');
Route::get('/IdOfFirstTopicInSubject/{subj_id}', 'TopicsController@getIdOfFirstTopicInSubject');
Route::get('/IdOfLastTopicInSubject/{subj_id}', 'TopicsController@getIdOfLastTopicInSubject');

// register controller route*/

// Route::view('/', 'welcome');
// Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');

Auth::routes();
Route::get('/{vue_capture?}', function () {
    return view('layouts.app');
  })->where('vue_capture', '[\/\w\.-]*');

// Route::get('/home', 'HomeController@index')->name('home');

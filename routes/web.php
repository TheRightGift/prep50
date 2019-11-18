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

Route::get('/', function () {
    return view('welcome');
});
//for topics
route::get('/topics/{topic}', 'TopicsController@edit');
route::get('/topics/{topic}', 'TopicsController@delete');



//for objective
route::get('/Objectives/{Objective}', 'ObjectivesController@getAll');
route::get('/Objectives/{Objective}', 'ObjectivesController@getOne');
route::get('/Objectives/{Objective}', 'ObjectivesController@getObjectivesInTopics');
route::get('/Objectives/{Objective}', 'ObjectivesController@getAllObjectsInSubjects');




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
//Route::get('/topics/{topic}', 'TopicsController@edit');
//Route::resource('subject', 'SubjectsController');
//Route::resource('activities', 'ActivitiesController');


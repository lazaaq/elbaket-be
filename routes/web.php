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

Auth::routes(['register'=>false,'reset'=>false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('auth.login');
   });

   //admin
   Route::group(['prefix' => 'admin'], function () {
     Route::resource('dashboard', 'DashboardController');
     Route::resource('question', 'QuestionController');
     Route::resource('user', 'UserController');
     Route::resource('answersave', 'AnswerSaveController');
     Route::resource('quiztype', 'QuizTypeController');
     Route::resource('lecture', 'LectureController');
     Route::resource('collager', 'CollagerController');
     Route::resource('quizcollager', 'QuizCollagerController');
     Route::resource('time', 'TimeController');
     Route::resource('quiz', 'QuizController');
   });
});




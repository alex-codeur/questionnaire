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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/questionnaires/create', 'QuestionnaireController@create')->name('questionnaires.create');
Route::post('/questionnaires', 'QuestionnaireController@store')->name('questionnaires.store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show')->name('questionnaires.show');

Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create')->name('questions.create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store')->name('questions.store');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy')->name('questions.destroy');

Route::get('/survey/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/survey/{questionnaire}-{slug}', 'SurveyController@store');
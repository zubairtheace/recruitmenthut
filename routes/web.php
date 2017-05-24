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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/position', 'PositionController');

Route::resource('/vacancy', 'VacancyController');
//Route::get('/vacancy/search', 'VacancyController@search');
Route::post('/vacancy/search', 'VacancyController@search');

Route::post('/candidate/search', 'CandidateController@search');

Route::resource('/candidate', 'CandidateController');

Route::get('/recruited-candidate', 'CandidateController@recruitedCandidate');

Route::resource('/interview-type', 'InterviewTypeController');

Route::resource('/user-type', 'UserTypeController');

Route::resource('/recruiter', 'RecruiterController');

Route::resource('/application', 'ApplicationController');

Route::resource('/interview', 'InterviewController');

Route::get('/interview/create/{id?}', 'InterviewController@create');

Route::post('candidate/{id}/email', 'CandidateController@email')->name('candidate.email');
Route::get('interview/{id}/conduct', 'InterviewController@conduct')->name('interview.conduct');
Route::get('candidate-interview/{id}', 'InterviewController@candidateInterview');

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

Route::get('/vacancies', 'HomeController@vacancies');

Route::get('/candidates', 'HomeController@candidates');

Route::get('/applications', 'HomeController@applications');

Route::get('/interviews', 'HomeController@interviews');

Route::get('/recruiters', 'HomeController@recruiters');

Route::get('/positions', 'HomeController@positions');

Route::get('application/candidate-index', 'ApplicationController@candidateIndex');

Route::get('/interview-types', 'HomeController@interviewTypes');

Route::resource('/position', 'PositionController');

Route::resource('/vacancy', 'VacancyController');

Route::resource('/candidate', 'CandidateController');

Route::resource('/interview-type', 'InterviewTypeController');

Route::resource('/user-type', 'UserTypeController');

Route::resource('/recruiter', 'RecruiterController');

Route::resource('/application', 'ApplicationController');

Route::resource('/interview', 'InterviewController');

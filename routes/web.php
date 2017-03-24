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

Route::get('/home', 'HomeController@index');

Route::get('/vacancies', 'HomeController@vacancies');

Route::get('/candidates', 'HomeController@candidates');

Route::get('/interviews', 'HomeController@interviews');

Route::get('/management', 'HomeController@management');

Route::resource('/position', 'PositionController');

Route::resource('/vacancy', 'VacancyController');

Route::resource('/interview-type', 'InterviewTypeController');

Route::resource('/user-type', 'UserTypeController');

Route::resource('/recruiter', 'RecruiterController');

Route::resource('/application', 'ApplicationController');

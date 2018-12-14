<?php

/*
|--------------------------------------------------------------------------
| Main Site
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/fontawesome', function () {
    return view('fontawesome');
});


// Profile

Route::get('/user', 'UserController@index');
Route::get('/user/{user}', 'UserController@edit');
Route::post('/user/update/{user}', 'UserController@update');

// Report

Route::get('/report', 'ReportController@index');
Route::get('/report/create', 'ReportController@create');
Route::post('/report', 'ReportController@store');
Route::get('/report/{report}', 'ReportController@show');

// Statistics

Route::get('/statistics', 'StatisticsController@index');

Route::get('/statistics/bar', 'StatisticsController@bar');

Route::post('/statistics/bar', 'StatisticsController@crime_per_type');

Route::get('/statistics/pie', 'StatisticsController@pie');

Route::post('/statistics/pie', 'StatisticsController@crime_per_gender');

Route::get('/statistics/chart', 'StatisticsController@chart');

Route::post('/statistics/chart', 'StatisticsController@chart_show');

// Search

Route::get('/search', 'SearchController@index');

Route::post('/search', 'SearchController@show');


// Communities
Route::get('/communities', 'CommunitiesController@index');
/*
|--------------------------------------------------------------------------
| Administration
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/administration', 'AdministrationHomeController@index')->name('admin_home');
Route::get('/administration/home', 'AdministrationHomeController@index');

Route::get('/administration/login', 'AdministrationSessionsController@create')->name('admin_login');
Route::post('/administration/login', 'AdministrationSessionsController@store');
Route::get('/administration/logout', 'AdministrationSessionsController@destroy');

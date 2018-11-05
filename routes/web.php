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

// Incident

Route::get('/incident', 'IncidentController@index');
Route::get('/incident/create', 'IncidentController@create');
Route::post('/incident', 'IncidentController@store');
Route::get('/incident/{incident}', 'IncidentController@show');

// Statistics

Route::get('/statistics', 'StatisticsController@index');

Route::get('/statistics/bar', 'StatisticsController@bar');

Route::post('/statistics/bar', 'StatisticsController@crime_per_type');

Route::get('/statistics/pie', 'StatisticsController@pie');

Route::post('/statistics/pie/', 'StatisticsController@crime_per_gender');

Route::get('/statistics/chart', 'StatisticsController@chart');

// Search

Route::get('/search', 'SearchController@index');

Route::post('/search', 'SearchController@show');
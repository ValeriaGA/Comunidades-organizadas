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
    return view('user.index');
});

////Information
Route::get('/about', function () {
    return view('information.about');
});

////News
Route::get('/news', function () {
    return view('news.reports');
});
Route::get('/add-news', function () {
    return view('news.add_news');
});



////Security
Route::get('/security', function () {
    return view('security.security');
});
Route::get('/add-security-report', function () {
    return view('security.add_security_report');
});

////Service
Route::get('/service', function () {
    return view('service.services');
});
Route::get('/add-service-report', function () {
    return view('service.add_service_report');
});

////Reports
Route::get('/report-type', function () {
    return view('reports.report_type');
});
Route::get('/map', function () {
    return view('reports.map');
});

////User
Route::get('/signin', function () {
    return view('user.index');
});
Route::get('/signup', function () {
    return view('user.signup');
});
Route::get('/profile', function () {
    return view('user.profile');
});

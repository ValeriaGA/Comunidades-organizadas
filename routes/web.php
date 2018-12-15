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
Route::get('/reporte', 'ReportController@index');
Route::get('/reporte/{reporte}', 'ReportController@show');

Route::get('/seguridad/agregar', 'SecurityReportController@create');
Route::post('/seguridad', 'SecurityReportController@store');

Route::get('/servicio/agregar', 'ServiceReportController@create');
Route::post('/servicio', 'ServiceReportController@store');

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

Route::get('/administracion', 'AdministrationHomeController@index')->name('admin_home');
Route::get('/administracion/home', 'AdministrationHomeController@index');

Route::get('/administracion/login', 'AdministrationSessionsController@create')->name('admin_login');
Route::post('/administracion/login', 'AdministrationSessionsController@store');
Route::get('/administracion/logout', 'AdministrationSessionsController@destroy');

Route::get('/administracion/administradores', 'AdministrationUsersController@index');
Route::get('/administracion/administradores/agregar', 'AdministrationUsersController@create');
Route::post('/administracion/administradores', 'AdministrationUsersController@store');

Route::get('/administracion/reportes', 'AdministrationReportController@index');
Route::get('/administracion/reportes/{report}', 'AdministrationReportController@show');

Route::get('/administracion/publicaciones', 'AdministrationPublicationController@index');
Route::get('/administracion/publicaciones/{publicacion}', 'AdministrationPublicationController@show');

Route::get('/administracion/seguridad', 'AdministrationSecurityController@index');
Route::get('/administracion/seguridad/agregar', 'AdministrationSecurityController@create');
Route::get('/administracion/seguridad/{categoria}', 'AdministrationSecurityController@edit');
Route::post('/administracion/seguridad/update/{categoria}', 'AdministrationSecurityController@update');

Route::get('/administracion/servicio', 'AdministrationServiceController@index');
Route::get('/administracion/servicio/agregar', 'AdministrationServiceController@create');

Route::get('/administracion/estados', 'AdministrationStateController@index');
Route::get('/administracion/estados/agregar', 'AdministrationStateController@create');

Route::get('/administracion/generos', 'AdministrationGenderController@index');
Route::get('/administracion/generos/agregar', 'AdministrationGenderController@create');

Route::get('/administracion/evidencias', 'AdministrationEvidenceController@index');
Route::get('/administracion/evidencias/agregar', 'AdministrationEvidenceController@create');

Route::get('/administracion/comunidades', 'AdministrationCommunityController@index');
Route::get('/administracion/comunidades/agregar', 'AdministrationCommunityController@create');
Route::get('/administracion/comunidades/{comunidad}', 'AdministrationCommunityController@show');

//
Route::get('/administracion/categories', 'AdministrationCategoryController@index');
Route::get('/administracion/categories/create', 'AdministrationCategoryController@create');
Route::post('/administracion/categories', 'AdministrationCategoryController@store');
Route::get('/administracion/categories/{category}', 'AdministrationCategoryController@edit');
Route::post('/administracion/categories/update/{category}', 'AdministrationCategoryController@update');

Route::get('/administracion/products', 'AdministrationProductController@index');
Route::get('/administracion/products/create', 'AdministrationProductController@create');
Route::post('/administracion/products', 'AdministrationProductController@store');
Route::get('/administracion/products/{product}', 'AdministrationProductController@edit');
Route::post('/administracion/products/update/{product}', 'AdministrationProductController@update');

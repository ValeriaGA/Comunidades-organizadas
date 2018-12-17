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


// Provinces, cantones y distritos
Route::get('/provincias', 'ProvinceController@index');
Route::post('/cantones', 'CantonController@show');
Route::post('/distritos', 'DistrictController@show');
Route::post('/comunidades', 'CommunitiesController@show');
Route::post('/grupos', 'GroupController@show');


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

Route::get('/noticia/agregar', 'NewsController@create');
Route::post('/noticia', 'NewsController@store');

// Statistics

Route::get('/statistics', 'StatisticsController@index');

Route::get('/statistics/bar', 'StatisticsController@bar');

Route::post('/statistics/bar', 'StatisticsController@crime_per_type');

Route::get('/statistics/pie', 'StatisticsController@pie');

Route::post('/statistics/pie', 'StatisticsController@crime_per_gender');

Route::get('/statistics/cr_map', 'StatisticsController@reports_per_province');

Route::get('/statistics/chart', 'StatisticsController@chart');

Route::post('/statistics/chart', 'StatisticsController@chart_show');

// Search

Route::get('/busqueda', 'SearchController@index');

Route::post('/busqueda', 'SearchController@show');


// Communities
Route::get('/comunidades', 'CommunitiesController@index');
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

// Administrators
Route::get('/administracion/administradores', 'AdministrationUsersController@index');
Route::get('/administracion/administradores/agregar', 'AdministrationUsersController@create');
Route::post('/administracion/administradores', 'AdministrationUsersController@store');

// Roles
Route::get('/administracion/roles', 'AdministrationRoleController@index');
// Route::get('/administracion/roles/agregar', 'AdministrationRoleController@create');
Route::get('/administracion/roles/{rol}', 'AdministrationStateController@edit');


// Reports (Report Alerts)
Route::get('/administracion/reportes', 'AdministrationReportController@index');
Route::get('/administracion/reportes/{report}', 'AdministrationReportController@show');


// Publications (Reports)
Route::get('/administracion/publicaciones', 'AdministrationPublicationController@index');
Route::get('/administracion/publicaciones/{publicacion}', 'AdministrationPublicationController@show');


// Security Category
Route::get('/administracion/seguridad', 'AdministrationSecurityController@index');

Route::get('/administracion/seguridad/transportes/agregar', 'AdministrationTransportationController@create');
Route::get('/administracion/seguridad/armas/agregar', 'AdministrationWeaponController@create');
Route::get('/administracion/seguridad/categorias/agregar', 'AdministrationSecurityController@create');


Route::post('/administracion/seguridad/categorias', 'AdministrationUsersController@store');

Route::get('/administracion/seguridad/{categoria}', 'AdministrationSecurityController@edit');
Route::post('/administracion/seguridad/update/{categoria}', 'AdministrationSecurityController@update');


// Service Category
Route::get('/administracion/servicio', 'AdministrationServiceController@index');
Route::get('/administracion/servicio/agregar', 'AdministrationServiceController@create');
Route::post('/administracion/servicio', 'AdministrationServiceController@store');
Route::get('/administracion/servicio/{service}', 'AdministrationServiceController@edit');
Route::post('/administracion/servicio/update/{service}', 'AdministrationServiceController@update');

// State
Route::get('/administracion/estados', 'AdministrationStateController@index');
Route::get('/administracion/estados/agregar', 'AdministrationStateController@create');
Route::post('/administracion/estados', 'AdministrationStateController@store');
Route::get('/administracion/estados/{state}', 'AdministrationStateController@edit');
Route::post('/administracion/estados/update/{state}', 'AdministrationStateController@update');

// Gender
Route::get('/administracion/generos', 'AdministrationGenderController@index');
Route::get('/administracion/generos/agregar', 'AdministrationGenderController@create');
Route::post('/administracion/generos', 'AdministrationGenderController@store');
Route::get('/administracion/generos/{gender}', 'AdministrationGenderController@edit');
Route::post('/administracion/generos/update/{gender}', 'AdministrationGenderController@update');

// Evidence
Route::get('/administracion/evidencias', 'AdministrationEvidenceController@index');
Route::get('/administracion/evidencias/agregar', 'AdministrationEvidenceController@create');
Route::post('/administracion/evidencias', 'AdministrationEvidenceController@store');
Route::get('/administracion/evidencias/{evidence}', 'AdministrationEvidenceController@edit');
Route::post('/administracion/evidencias/update/{evidence}', 'AdministrationEvidenceController@update');

// Communities
Route::get('/administracion/comunidades/comunidad', 'AdministrationCommunityController@index');
Route::get('/administracion/comunidades/comunidad/agregar', 'AdministrationCommunityController@create');
Route::get('/administracion/comunidades/comunidad/{community_group}', 'AdministrationCommunityController@edit');

Route::get('/administracion/comunidades/grupos', 'AdministrationCommunityGroupController@index');
Route::get('/administracion/comunidades/grupos/agregar', 'AdministrationCommunityGroupController@create');
Route::post('/administracion/comunidades/grupos', 'AdministrationCommunityGroupController@store');
Route::get('/administracion/comunidades/grupos/{community_group}', 'AdministrationCommunityGroupController@edit');
Route::post('/administracion/comunidades/grupos/update/{community_group}', 'AdministrationCommunityGroupController@update');


// ~~~

Route::get('/administracion/products', 'AdministrationProductController@index');
Route::get('/administracion/products/create', 'AdministrationProductController@create');
Route::post('/administracion/products', 'AdministrationProductController@store');
Route::get('/administracion/products/{product}', 'AdministrationProductController@edit');
Route::post('/administracion/products/update/{product}', 'AdministrationProductController@update');

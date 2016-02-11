<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*Route::group(['middleware' => ['web']], function () {
    //
});*/
Route::get('login','frontController@login');
Route::group(['middleware' => 'web'], function () {
    Route::auth();

Route::get('index','frontController@index');
Route::get('contacto','frontController@contacto');
Route::get('galeria','frontController@galeria');




/*************RUTAS DE TYPES Y SECTIOSN ***************/
Route::get('admin/typesnew','typeController@type');//abre el formulario para nuevo typo
Route::resource('types','typeController'); //manda a llamar la funcion store

Route::resource('admin/types','typeController@type');// redirecciona asi mismo despues de guardar
Route::get('admin/sectionsnew','sectiosController@section'); //formulario sectionsform.blade.php
Route::resource('admin/sections','sectiosController');      //index. catalogo
Route::get('admin/sectionedit/{id}','sectiosController@edit');
Route::put('admin/section/update','sectiosController@update');
///// ELIMINAR
Route::get('admin/sectiondel/{id}','sectiosController@delete');
//ordenar
Route::get('admin/sectionorder/{id}/{orderBy}/{no}','sectiosController@order');
////// PUBLICAR
Route::get('admin/sectionsPriva/{id}/{priv}','sectiosController@privado');
Route::get('admin/sectionsPublic/{id}/{pub}','sectiosController@publicate');
/****************************************************/




/*************RUTAS DE ALBUMS Y PICTURES ***************/
///// Catalogos 
Route::get('admin/media','MediaController@index');
Route::resource('admin/media','MediaController');
///// FORMS
Route::get('admin/medianew','MediaController@medianew');
Route::post('admin/media/store','MediaController@store');
///// EDICION
Route::get('admin/mediaedit/{id}','MediaController@edit');
Route::put('admin/media/update','MediaController@update');
////// ELIMINAR
Route::get('admin/mediadel/{id}','MediaController@delete');
////// ORDENAR 
Route::get('admin/mediaorder/{id}/{orderBy}/{no}','MediaController@order');
////// PUBLICAR
Route::get('admin/mediapub/{id}/{pub}','MediaController@publicate');
/////  INDEX PAGE


/*********************rutas de usuario**********************/
Route::get('/admin', 'HomeController@index');/*pagina principal despues de logearse*/
Route::resource('usuario','usuarioController');
Route::get('admin/user', 'usuarioController@index');
Route::get('admin/userNew', 'usuarioController@create');
Route::get('admin/userEdit/{id}','usuarioController@edit');
Route::put('admin/user/update','usuarioController@update');
Route::get('admin/sectionedit/{id}','sectiosController@edit');
Route::get('usuario/register','usuarioController@register');

/************************roles de usuario*************************/
Route::get('/admin', 'HomeController@index');/*pagina principal despues de logearse*/
Route::resource('rol','rolesController');
Route::get('admin/roles', 'rolesController@index');
});

Route::get('/','LogController@logout');



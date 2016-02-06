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


Route::get('index','frontController@index');
Route::get('contacto','frontController@contacto');
Route::get('galeria','frontController@galeria');

Route::get('login','frontController@login');








/*************RUTAS DE TYPES Y SECTIOSN ***************/
Route::get('admin/types','typeController@type');
Route::resource('types','typeController'); 
Route::get('admin/sectionsnew','sectiosController@section'); //formulario
Route::resource('admin/sections','sectiosController@index');      //index catalogo
Route::resource('sections','sectiosController');            //llamada a store para guardar los datos en la db
/****************************************************/


/*********************RUTAS PARA ADMINITRACION DE USUARIO Y SESIONES******/
Route::get('/','frontController@panel');
Route::resource('log','LogController'); //ruta para la autentificacion
Route::resource('usuario','userController'); //ruta para el registro de usuarios
/***********************************************************************/

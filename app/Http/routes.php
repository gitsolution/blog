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

/*edita raul*/
Route::get('admin/types','typeController@type');
Route::get('admin/sections','sectiosController@section');
Route::resource('types','typeController'); 
Route::resource('sections','sectiosController'); 

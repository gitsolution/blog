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

Route::get('login','frontController@login');
Route::get('/','LogController@logout');


    /////  INDEX PAGE ADMIN
Route::get('/admin', 'HomeController@index');
/// INDEX PAGE FRONTEND
Route::get('index','frontController@index');
Route::get('contacto','frontController@contacto');
Route::get('galeria','frontController@galeria');

Route::group(['middleware' => 'web'], function () {
    Route::auth();


/*************RUTAS DE TYPES******************************/
Route::get('admin/typesnew','typeController@typenew');//abre el formulario para nuevo typo
Route::resource('admin/types','typeController'); //manda a llamar la funcion store
Route::get('admin/typesedit/{id}','typeController@edit');
Route::put('admin/types/update','typeController@update');
///// ELIMINAR
Route::get('admin/typedel/{id}','typeController@delete');

/*************RUTAS DE CATEGORIAS******************************/
Route::get('admin/categorynew','categoryController@categorynew');
Route::resource('admin/category','categoryController'); 
///ACTUALIZAR
Route::get('admin/categoryedit/{id}','categoryController@edit');
Route::put('admin/category/update','categoryController@update');
///// ELIMINAR
Route::get('admin/categorydel/{id}','categoryController@delete');
Route::get('admin/delcatpic/{id}','categoryController@deletePicture');
////// PUBLICAR
Route::get('admin/categoryPriva/{id}/{priv}','categoryController@privado');
Route::get('admin/categoryPublic/{id}/{pub}','categoryController@publicate');
//ORDENAR
Route::get('admin/categoryorder/{id}/{orderBy}/{no}','categoryController@order');


/*************RUTAS DE SECTIOSN ****************************/
Route::get('admin/sectionsnew','sectiosController@section'); //formulario sectionsform.blade.php
Route::resource('admin/sections','sectiosController');      //index. catalogo
Route::get('admin/sectionedit/{id}','sectiosController@edit');
Route::put('admin/section/update','sectiosController@update');
///// ELIMINAR
Route::get('admin/sectiondel/{id}','sectiosController@delete');
Route::get('admin/delsecpic/{id}','sectiosController@deletePicture');
//ORDENAR
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
Route::get('admin/mediaind/{id}/{ind}','MediaController@index_page');
/*************RUTAS DE PICTURES ***************/
/////  
Route::get('admin/item','ItemController@index');
Route::resource('admin/item','ItemController');
///// FORMS
/// Route::get('admin/itemnew/{id}','ItemController@create');
Route::get('admin/itemnew','ItemController@itemnew');
Route::post('admin/item/store','ItemController@store');
///// EDICION
Route::get('admin/itemedit/{id}','ItemController@edit');
Route::put('admin/item/update','ItemController@update');
////// ELIMINAR
Route::get('admin/itemdel/{id}','ItemController@delete');
////// ORDENAR 
Route::get('admin/itemorder/{id}/{orderBy}/{no}','ItemController@order');
////// PUBLICAR
Route::get('admin/itempub/{id}/{pub}','ItemController@publicate');
/////  INDEX PAGE
Route::get('admin/itemind/{id}/{ind}','ItemController@index_page');

/*********************rutas de usuario**********************/
Route::get('/admin', 'HomeController@index');/*pagina principal despues de logearse*/
Route::resource('usuario','usuarioController');
Route::get('admin/user', 'usuarioController@index');
Route::get('admin/userNew', 'usuarioController@create');
Route::get('admin/userEdit/{id}','usuarioController@edit');
Route::put('admin/user/update','usuarioController@update');
Route::get('admin/sectionedit/{id}','sectiosController@edit');
Route::get('usuario/register','usuarioController@register');


Route::resource('mail','mailController');


/**********************para enviar correo*********************************/
Route::get('password/email','Auth\PasswordController@getEmail');
Route::get('password/email','Auth\PasswordController@postEmail');
/*****************Resetear contraseña*******************/
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');
/**********************para confirmar cuenta********************************/
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');

/************************roles de usuario*************************/
Route::get('/admin', 'HomeController@index');/*pagina principal despues de logearse*/
Route::resource('admin/rol','rolesController');
Route::get('admin/roles', 'rolesController@index');
Route::get('admin/rolesNew', 'rolesController@create');
Route::get('admin/rolesEdit/{id}','rolesController@edit');
Route::put('admin/rolesUpdate','rolesController@update');

/*para la asignacion de roles de usuarios*/
Route::resource('admin/assignment/','usr_login_roleController');
Route::get('admin/assignment', 'usr_login_roleController@index');
Route::get('admin/assignmentNew', 'usr_login_roleController@create');
Route::get('admin/rolesEdit/{id}','usr_login_roleController@edit');
Route::get('admin/rolesDelete/{id}','usr_login_roleController@delete');
/************************cmd access**********************************/
Route::resource('admin/cms','cmsController');
Route::get('admin/cms', 'cmsController@index');
Route::get('admin/cmsNew', 'cmsController@create');
Route::get('admin/cmsEdit/{id}','cmsController@edit');
Route::put('admin/cmsUpdate','cmsController@update');


/*************RUTAS DE DOCUMENTS******************************/
Route::get('admin/documentnew','DocumentController@documentynew');
Route::resource('admin/document','DocumentController'); 
///ACTUALIZAR
Route::get('admin/documentedit/{id}','DocumentController@edit');
Route::put('admin/document/update','DocumentController@update');
///// ELIMINAR
Route::get('admin/documentdel/{id}','DocumentController@delete');
Route::get('admin/deldocpic/{id}','DocumentController@deletePicture');

////// PUBLICAR
Route::get('admin/documentPriva/{id}/{priv}','DocumentController@privado');
Route::get('admin/documentPublic/{id}/{pub}','DocumentController@publicate');
//ORDENAR
Route::get('admin/documentorder/{id}/{orderBy}/{no}','DocumentController@order');


});




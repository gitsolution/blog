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
Route::resource('inicio','frontController@index');
Route::resource('historia','frontController@historia');
Route::get('contacto','frontController@contacto');
Route::get('galeria','frontController@galeria');


Route::get('/getStreets?suburb={id}', function($id) {
   return cms_category::whereSuburb($id)->get();
});


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
Route::get('admin/item/{id_media}','ItemController@index');
Route::resource('admin/item','ItemController');
///// FORMS
Route::get('admin/itemnew/{id_media}','ItemController@itemnew');
//Route::get('admin/itemnew','ItemController@itemnew');
Route::post('admin/item/store','ItemController@store');
///// EDICION
Route::get('admin/itemedit/{id}','ItemController@edit');
Route::put('admin/item/update','ItemController@update');
////// ELIMINAR
Route::get('admin/itemdel/{id}','ItemController@delete');
Route::get('admin/delpic/{id}','ItemController@deletePicture');
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

/**********************para perfil de usuario*******************************/
Route::resource('admin/perfil','perfilController');
Route::get('admin/perfilEdit','perfilController@index');
Route::get('admin/perfil','perfilController@store');
Route::get('admin/perfilNew','perfilController@perfil');//editar usuario
Route::put('admin/perfilUpdate','perfilController@update');//editar usuario

Route::get('admin/sectionedit/{id}','sectiosController@edit');
Route::put('admin/section/update','sectiosController@update');
/**********************para enviar correo*********************************/
Route::resource('mail','mailController');

Route::get('password/email','Auth\PasswordController@getEmail');
Route::get('password/email','Auth\PasswordController@postEmail');
/*****************Resetear contraseñ*******************/
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
Route::get('auth/register/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');


/************************roles de usuario*************************/
Route::get('/admin', 'HomeController@index');/*pagina principal despues de logearse*/
Route::resource('admin/rol','rolesController');
Route::get('admin/roles', 'rolesController@index');

Route::get('admin/rolesNew', 'rolesController@create');
Route::get('admin/rolesEdit/{id}','rolesController@edit');
Route::put('admin/rolesUpdate','rolesController@update');
Route::get('admin/rolActive/{id}/{acti}','rolesController@activar');

/*para la asignacion de roles de usuarios*/
Route::resource('admin/assignment','usr_login_roleController');

//Route::get('admin/assignment', 'usr_login_roleController@index');
Route::get('admin/rolesDelete/{id}','usr_login_roleController@delete');
Route::get('admin/rolesUpdate','usr_login_roleController@update');
Route::get('admin/permissionEdit/{id}', 'usr_login_roleController@obtener');
/************************cms access**********************************/
Route::resource('admin/cms','cmsController');
Route::get('admin/cms', 'cmsController@index');
Route::get('admin/cmsNew', 'cmsController@create');
Route::get('admin/cmsEdit/{id}','cmsController@edit');
Route::put('admin/cmsUpdate','cmsController@update');
Route::get('admin/cmsActive/{id}/{acti}','cmsController@activar');

/******************modulos de configuracion*********************/
Route::resource('admin/config','configController');
Route::get('admin/configPermission', 'configController@index');
Route::get('admin/configPermission/{idModulo}/{idRol}', 'configController@create');

/************************para permisos de usuarios************************************/
Route::resource('admin/configUpdate', 'roleActionController');




/******************permission modules****************************/
Route::resource('admin/permission','module_permission');
Route::get('admin/permission/{id}', 'module_permission@index');
Route::get('admin/permissionModules','module_permission@create');

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





///// Catalogos de menus
Route::get('admin/menus','MenuController@index');
Route::resource('admin/menus','MenuController');
///// FORMS
Route::get('admin/menunew','MenuController@menunew');
Route::post('admin/menus/store','MenuController@store');


///// EDICION
Route::get('admin/menuedit/{id}','MenuController@edit');

Route::put('admin/menu/update','MenuController@update');
////// ELIMINAR
Route::get('admin/menudel/{id}','MenuController@delete');
////// ORDENAR 
Route::get('admin/menuorder/{id}/{orderBy}/{no}','MenuController@order');
////// PUBLICAR
Route::get('admin/menupub/{id}/{pub}','MenuController@publicate');
/////  INDEX PAGE
Route::get('admin/menuind/{id}/{ind}','MenuController@index_page');


/////  Catalogo de Elementos del Menu
Route::get('admin/itemmenu/{id_menu}','ItemMenuController@index');
Route::resource('admin/itemmenu','ItemMenuController');
///// FORMS

Route::get('admin/itemmenunew/{id_menu}/','ItemMenuController@itemnew');
/////  Paso 1. Seleccionar la opción de menú
Route::get('admin/optionmenu/{id_menu}/{parent_id}','ItemMenuController@optionmenu');
/////  Paso 2. Seleccionar Tipo de Menu 
Route::get('admin/optionmenu/{id_menu}/{parent_id}/{typemenu}','ItemMenuController@typemenu');
/////  Paso 1. 

/////  Paso 1. 



Route::get('admin/itemmenunew/{id_menu}/{level}/{menutype}','ItemMenuController@itemnew3');
Route::get('admin/itemmenunew/{id_menu}/{level}/{menutype}/{id_menutype}','ItemMenuController@itemnew4');

Route::get('admin/itemsubmenu/{id_menu}','ItemMenuController@submenu');
//Route::get('admin/itemnew','ItemController@itemnew');
Route::post('admin/itemmenu/store','ItemMenuController@store');
///// EDICION
Route::get('admin/itemmenuedit/{id}','ItemMenuController@edit');
Route::put('admin/itemmenu/update','ItemMenuController@update');
////// ELIMINAR
Route::get('admin/itemmenudel/{id}','ItemMenuController@delete');
Route::get('admin/delitemmenupic/{id}','ItemMenuController@deletePicture');
////// ORDENAR 
Route::get('admin/itemmenuorder/{id}/{orderBy}/{no}','ItemMenuController@order');
////// PUBLICAR
Route::get('admin/itemmenupub/{id}/{pub}','ItemMenuController@publicate');
/////  INDEX PAGE
Route::get('admin/itemmenuind/{id}/{ind}','ItemMenuController@index_page');


//Route::get('getSelect','DocumentController@');
Route::get('admin/getSelect/{id_section}','DocumentController@getCategories');




});




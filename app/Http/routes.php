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

Route::get('/','LogController@logout');
/*Redireccion a la pagina de error 404*/


Route::group(['middleware' => 'web'], function () {

/******************paginas con captcha ***************************/

/*************RUTAS DE Comentarios ****************************/

Route::get('admin/comments','commentController@index');
///// ELIMINAR
Route::get('admin/commentdel/{id}','commentController@delete');
Route::get('admin/commentPublic/{id}/{pub}','commentController@publicate'); 
Route::get('admin/commentresp/{id}/{uri}','commentController@respuesta');

/****************************************************/
/// PAGINAS ESTATICAS 
Route::resource('Inicio','cresolidoController@index');
Route::get('Inicio','cresolidoController@index');
Route::get('Empresa','cresolidoController@page');
Route::get('Servicios','cresolidoController@page');
Route::get('Sucursales','cresolidoController@page');
Route::get('Servicios-Financieros','cresolidoController@page');
Route::get('Cobertura','cresolidoController@page');
Route::get('Atencion-a-Usuarios','cresolidoController@page');
Route::get('Informacion','cresolidoController@page');
Route::get('Aviso-de-privacidad','cresolidoController@page');
Route::get('Preguntas-frecuentes','cresolidoController@page');
Route::get('Blog','cresolidoController@BlogList');
Route::get('Blog/{post}','cresolidoController@Blog');
Route::get('Login','cresolidoController@page');


/// PAGINAS ESTATICAS 
/*
Route::get('Inicio','frontController@index');
Route::get('Empresa','frontController@page');
Route::get('Servicios','frontController@page');
Route::get('Servicios-Financieros','frontController@page');
Route::get('Cobertura','frontController@page');
Route::get('Atencion-a-usuarios','frontController@page');
Route::get('Informacion','frontController@page');
Route::get('Politica-de-Privacidad','frontController@page');
Route::get('Blog','frontController@BlogList');
Route::get('Blog/{post}','frontController@Blog');
Route::get('Login','frontController@page');
*/

/// INDEX PAGE cresolidoEND
Route::get('Sec/{option}','cresolidoController@section');
Route::get('Cat/{optio}','cresolidoController@category');
Route::get('Doc/{option}','cresolidoController@document');
Route::get('CatList/{option}','cresolidoController@listCategory');
Route::get('DocList/{option}','cresolidoController@listDocument');
Route::get('Galleries','cresolidoController@listGalleries');
Route::get('Galleries/{option}','cresolidoController@galleries');

//Route::get('contactoEnviar','cresolidoController@enviar');
Route::get('frmcotizacion','cresolidoController@cotizacion');
 
Route::get('Contacto','cresolidoController@Contacto');
Route::resource('cotizacion','cotizacioncontroller');

//Route::get('contactoEnviar','cresolidoController@enviar');
Route::get('frmcotizacion','cresolidoController@cotizacion');
 
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

/*************RUTAS DE SECTIONS ****************************/
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



/*************RUTAS DE SETINGS ****************************/
Route::resource('admin/seting','setingController');      
Route::get('admin/setingnew','setingController@seting'); 
Route::get('admin/setingedit/{id}','setingController@edit');
Route::put('admin/seting/update','setingController@update');
///// ELIMINAR
Route::get('admin/setingdel/{id}','setingController@delete');
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
//Route::get('admin/sectionedit/{id}','sectiosController@edit');
Route::get('usuario/register','usuarioController@register');

/**********************para perfil de usuario*******************************/
Route::resource('admin/perfil','perfilController');
Route::get('admin/perfilEdit','perfilController@index');
Route::get('admin/perfil','perfilController@store');
Route::get('admin/perfilNew','perfilController@perfil');//editar usuario
Route::put('admin/perfilUpdate','perfilController@update');//editar usuario

//Route::get('admin/sectionedit/{id}','sectiosController@edit');
//Route::put('admin/section/update','sectiosController@update');
/**********************para enviar correo*********************************/
Route::resource('mail','mailController');

Route::get('password/email','Auth\PasswordController@getEmail');
Route::get('password/email','Auth\PasswordController@postEmail');
/*****************Resetear contraseÃƒÂ±*******************/
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
Route::get('auth/register/email/{email}/confirm_token/{confirm_token}', 'Auth\AuthController@confirmRegister');


/************************roles de usuario*************************/
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
Route::get('admin/permissionEdit/{id}', 'usr_login_roleController@updateRol');
/************************ modulos **********************************/
Route::resource('admin/cms','sysmodulecontroller');
Route::get('admin/module', 'sysmodulecontroller@index');
Route::get('admin/moduleNew', 'sysmodulecontroller@create');
Route::get('admin/moduleEdit/{id}','sysmodulecontroller@edit');
Route::get('admin/modulePermissionEdit/{id}','sysmodulecontroller@editpermision');
Route::put('admin/moduleUpdate','sysmodulecontroller@update');
Route::get('admin/moduleActive/{id}/{acti}','sysmodulecontroller@activar');


/********************** submodulos **************************************/
Route::resource('admin/submodule','submenucontroller@store');
Route::get('admin/submodules/{id_menu}','submenucontroller@index');
Route::get('admin/submoduleEdit/{id}','submenucontroller@edit');
Route::put('admin/submoduleUpdate','submenucontroller@update');
Route::get('admin/submoduleNew/{id_menu}', 'submenucontroller@create');
Route::get('admin/submoduleActive/{id}/{idModulo}','submenucontroller@activar');
/***********************************************************************/

Route::resource('admin/cmsaccess','cmsController');
Route::get('admin/cmsaccessactive/{id}/{idactive}/{acti}','cmsController@activar');
/******************modulos de configuracion*********************/
Route::resource('admin/config','configController');
Route::get('admin/configPermission','configController@index');
Route::get('admin/configPermission/{idModulo}/{idRol}', 'configController@create');

/******************permisos especiales*********************/
Route::resource('admin/specialpermission','specialpermissioncontroller');
Route::get('admin/specialEdit/{id}', 'specialpermissioncontroller@index');
Route::get('admin/specialSelect/{idu}/{idr}/{idm}','specialpermissioncontroller@edit');

/************************para permisos de usuarios************************************/
Route::resource('admin/configUpdate', 'roleActionController');
Route::get('admin/permissionUpdate/{idRole}/{idModulo}/{action}/{active}','roleActionController@actualizar');



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

////// ELIMINAR
Route::get('admin/itemmenudel/{id}','ItemMenuController@delete');
Route::get('admin/delitemmenupic/{id}','ItemMenuController@deletePicture');
////// ORDENAR 
Route::get('admin/itemmenuorder/{id}/{orderBy}/{no}','ItemMenuController@order');
////// PUBLICAR
Route::get('admin/itemmenupub/{id}/{pub}','ItemMenuController@publicate');
/////  INDEX PAGE
Route::get('admin/itemmenuind/{id}/{ind}','ItemMenuController@index_page');

Route::get('admin/getSelect/{id_section}','DocumentController@getCategories');

Route::get('admin/getSelect/{id_section}','DocumentController@getCategories');

Route::get('admin/document/{no}/getSelect/{id_section}','DocumentController@getEditCategories');

Route::get('admin/getSelectDoc/{id_category}','ItemMenuController@getEditDocuments');

////////////////// RUTAS PARA LOS MENUS
Route::get('admin/itemmenu/{id_menu}/{level}','ItemMenuController@index');

Route::get('admin/{menu}/{id_menu}/{id_parent}','ItemMenuController@typemenu');

Route::get('admin/{menu}/{id_menu}/{id_parent}','ItemMenuController@optionmenu');

Route::resource('admin/itemmenuadd','ItemMenuController@store');

Route::resource('coment/coment','commentController');


/********************** Ruta para las graficas**************************/
Route::resource('admin/graph','graficaController');
Route::get('admin/graph','graficaController@index');

/***********************************************************************/
/*************RUTAS DE ARCHIVOS ***************/
/////  
Route::get('admin/itemFiles/{id_directory}','ItemFilesController@index');
Route::resource('admin/itemFiles','ItemFilesController');
///// FORMS
Route::get('admin/itemFilesnew/{id_directory}','ItemFilesController@itemnew');

Route::post('admin/itemFiles/store','ItemFilesController@store');
///// EDICION
Route::get('admin/itemFilesedit/{id}','ItemFilesController@edit');
Route::put('admin/itemFiles/update','ItemFilesController@update');
////// ELIMINAR
Route::get('admin/itemFilesdel/{id}','ItemFilesController@delete');
Route::get('admin/delItemFiles/{id}','ItemFilesController@deleteFile');
////// ORDENAR 
Route::get('admin/itemFilesorder/{id}/{orderBy}/{no}','ItemFilesController@order');
////// PUBLICAR
Route::get('admin/itemFilespub/{id}/{pub}','ItemFilesController@publicate');
/////  INDEX PAGE
Route::get('admin/itemFilesind/{id}/{ind}','ItemFilesController@index_page');

});



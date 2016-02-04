<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class sectiosController extends Controller
{
    public function section()
    {
    	return view('sections.section');

    }
    
    public  function store(Request $request)
    {
       
		\App\cms_section::create([
      'id_type'=>'2',//$request['size'],
      'title' => $request['titulo'],
      'resumen'=>$request['resumen'],
      'content'=>$request['contenido'],
      'main_picture'=>'imagen',//$request['descripcion'],
      'private'=>$request['privado'],
      'publish_date'=>'2015/03/03',//$request['descripcion'],
      'publish'=>$request['publico'],
      'uri'=>'cadena',//$request['descripcion'],
      'order_by'=>'1',//$request['descripcion'],
      'active'=>'1',//$request[''],
      'register_by'=>'1',//,$request[''],
      'register_date'=>'2015/02/02',
      'modify_by'=>'1',
      'modify_date'=>'2015/03/03',
      'register_by'=>'1',


      ]);
return "section registrado";


    }
}

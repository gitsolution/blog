<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class sectiosController extends Controller
{
  public function index()
   {
        $Sections = \App\cms_section::All();
      // var_dump($Sections); 
        return view('sections/index',compact('Sections'));
   }


  public function section()
    {
    	return view('sections.sectionform');
    }
    
  public  function store(Request $request)
    {
     
      $ChekPubli='0';
     if($request ['ChekPublicar']== 'on')
        {
          $ChekPubli='1';
        }
      $ChekPrivad='0';
     if($request ['ChekPrivado']== 'on')   
       {
         $ChekPrivad='1';
       }
     
		\App\cms_section::create([
      'id_type'=>'2',//$request['size'],
      'title' => $request['titulo'],
      'resumen'=>$request['resumen'],
      'content'=>$request['contenido'],
      'main_picture'=>'imagen',//$request['descripcion'],
      'private'=>$ChekPrivad,
      'publish_date'=>'2015/03/03',//$request['descripcion'],
      'publish'=>$ChekPubli,
      'uri'=>'cadena',//$request['descripcion'],
      'order_by'=>'1',//$request['descripcion'],
      'active'=>'1',//$request[''],
      'register_by'=>'1',//,$request[''],
      'modify_by'=>'1',
      'register_by'=>'1', ]);
      return  "section registrado";
    }
}

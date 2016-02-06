<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
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
      'id_type'=>$request['id_type'],
      'title' => $request['title'],
      'resumen'=>$request['resumen'],
      'content'=>$request['content'],
      'main_picture'=>$request['main_picture'],
      'private'=>$ChekPrivad,
      'publish_date'=>$request['publish_date'],//$request['descripcion'],
      'publish'=>$ChekPubli,
      'uri'=>'cadena',//$request['descripcion'],
      'order_by'=>'1',//$request['descripcion'],
      'active'=>'1',//$request[''],
      'register_by'=>'1',//,$request[''],
      'modify_by'=>'1',
      'register_by'=>'1',
       ]);
    return redirect('admin/sections');
    }

     public function edit($id)
    {
        $Section = \App\cms_section::find($id);
        return view('sections.sectionform',['Section'=>$Section]);
    }

       public function update($id, Request $request)
    {
        $Section = \App\cms_section::find($id);
        $Section->fill($request->all());
        $Section->save();

       
    }


}

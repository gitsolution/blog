<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class typeController extends Controller
{
   public function type()
    {
    	return view('Types.type');
    	
    }

      public function store(Request $request)
    {
      \App\cms_type::create([
      'title' => $request['titulo'],
      'description'=>$request['descripcion'],
      'active'=>'1',//$request[''],
      'register_by'=>'1',//,$request[''],
      'register_date'=>'2015/02/02',
      'modify_by'=>'1',
      'modify_date'=>'2015/03/03',
      'register_by'=>'1',
     

      ]);
      return view('Types.type');

      
    }

   


    
}

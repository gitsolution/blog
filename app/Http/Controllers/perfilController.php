<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class perfilController extends Controller
{
	public function index()
	{
		return view('usuario.perfil');
	}

    public function store(Request $request)
    { 
    	$publish= 0;
		$index_page=0;
		
		$file = $request->file('file');    
      if($file!=""){ 
      $path='store/user/'.uniqid().'.'.$file->getClientOriginalExtension();
      //indicamos que queremos guardar un nuevo archivo en el disco local
       Storage::disk('local')->put($path,  File::get($file));
      }
      else
      {
        $path="";
      }

	   $flag=1;	   	 
			\App\usr_profile::create([
			'id_login'=>'1',
			'name'=>$request['name'],	
			'lastname'=>$request['lastname'],	
			'picture'=>$path,	
			'gender'=>$request['id'],
			'born_date'=>$request['born_date'],
			]);
		return redirect('/admin/item')->with('message','store');
    }
}

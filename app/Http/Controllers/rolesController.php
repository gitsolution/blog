<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use App\usr_role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class rolesController extends Controller
{
    public function index()
	{	
		$roles = usr_role::All();
		return view('roles.index',compact('roles'));		
	}

	public function store(Request $request)
    {    	    	
    	$activado='0';
        if($request ['ChekActivacion']== "on")
        {
        	echo "El check esta activado";
          	$activado='1';
        }

    	usr_role::create([
    		'title'=>$request['title'],
            'description'=>$request['description'],
    		'active'=>$activado,
    	]);
        
       return Redirect::to("admin/roles");

    }

    public function create()
    {
    	return view('roles.rolesform');
    }

    public function edit($id)
    {
        $roles=usr_role::find($id);
        return view('roles.rolesform',['roles'=>$roles]);
    }



    public function update($id,Request $request){
        $roles = usr_role::find($id);
        $roles->fill($request->all());      
        $roles->save();
            
        return Redirect::to("admin/roles");
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use App\usr_role;
use App\Http\Requests\rolesRequest;
use App\Http\Controllers\Controller;

class rolesController extends Controller
{
    public function index()
	{	
		$roles = usr_role::All();
		return view('roles.index',compact('roles'));		
	}

	public function store(rolesRequest $request)
    {    	   	
    	$activado='0';
        if($request ['ChekActivacion']== "on")
        {
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
        return view('roles.rolesform',compact('roles'));
    }

    public function update($id,Request $request)
    {
         $activado='0';
        if($request ['ChekActivacion']== "on")
        {
            $activado='1';
        }

        $usrRol = usr_role::find($id);
        $usrRol->active=$activado;
        $usrRol->fill($request->all());      
        $usrRol->save();

        return Redirect::to("admin/roles");
    }

    public function activar($id,$active)
    {
        $priv=1;    
        if($active=='True')
        { 
            $active = 1;
        }

        else
        { $active = 0; }

        $roles = DB::table('usr_roles')->where('id', '=',$id)->update(['active'=>$active]);             
      Session::flash('message','Rol actualizado');    
        return redirect('/admin/roles')->with('message','store');
    }


}

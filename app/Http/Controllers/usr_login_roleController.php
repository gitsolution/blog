<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usr_login_role;
use App\usr_role;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class usr_login_roleController extends Controller
{
	 public function index()
	{	
		$usrRole = usr_role::paginate(20);
		return view('assignment.index',compact('usrRole'));
	}

     public function store(Request $request)
    {
        $activado='0';
        
                if($request ['ChekActivacion']== "on")
                {
                    $activado='1';
                }

                \App\usr_login_role::create([
                    'id_login'=>$request['idUser'],
                    'id_role'=>$request['id'],
                    'active'=> $activado,
                ]);

        

        return view('layouts.app');
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function edit($id)
    {
        $roles=usr_role::find($id);
        return view('roles.rolesform')->with('roles',$roles);
    }

     public function delete($id)
    {
        $query=usr_role::destroy($id);

        return view('layouts.app');
    }
}

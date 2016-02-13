<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usr_login_role;
use App\usr_role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class usr_login_roleController extends Controller
{
	 public function index()
	{	
		$usrRole = usr_role::paginate(20);
		return view('assignment.index',compact('usrRole'));
	}

     public function store()
    {
        usr_login_roles::create([
            'id_login'=>$request['id_login'],
            'id_role'=>$request['id_role'],
            'active'=>$request['chec'],
        ]);

        return Redirect::to("login");
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
}

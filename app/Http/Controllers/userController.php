<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
	public function index()
	{
		//
	}

    public function create()
    {
    	return view('usuario.create');
    }

    public function store(Request $request)
    {
    	/*\App\User::create([
    		'nombre'=>$request['nombre'],
    		'mail'=>'2',
    		'token'=>$request['nombre'],
    		'passwd'=>bcrypt($request['password']),
    		'activate_account'=>1,
    		'active'=>1,
    		'register_date'=>'2016/01/01',
    		'modify_by'=>'2016/01/01',
    		'modify_date'=>'2016/01/01',
    		'created_at'=>'2016/01/01',
    		'updated_at'=>'2016/01/01'
    	]);*/


\App\User::create([
    		'nombre'=>'nombre',
    		'mail'=>'2',
    		'token'=>'nombre',
    		'passwd'=>bcrypt($request['password']),
    		'activate_account'=>1,
    		'active'=>1,
    		'register_date'=>'2016/01/01',
    		'modify_by'=>'2016/01/01',
    		'modify_date'=>'2016/01/01',
    		'created_at'=>'2016/01/01',
    		'updated_at'=>'2016/01/01'
    	]);

    	return "Usuario registrado correctamente";
    }
}

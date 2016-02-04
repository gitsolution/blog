<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;


class LogController extends Controller
{
    //

    public function store(LoginRequest $request)
    {
    	if(Auth::attempt(['mail'=>$request['correoElectronico'],'passwd'=>$request['passwd']]))
    	{
    		return  Redirect::to('');
    	}

    	Session::flash('message-error','Los datos son incorrectos');
    	return Redirect::to('index');
    }
    

    public function logout()
    {
    	Auth::logout();
    	return Redirect::to("galeria");
    }
}


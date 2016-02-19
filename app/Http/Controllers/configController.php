<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\cms_access;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class configController extends Controller
{
    public function index()
    {
    	$modulos=\App\cms_access::All();
    	return view('configuracion/index',compact('modulos'));
    }

    public function store(Request $request)
    {
    	$idRole=$request['id'];
    	$idModulo=$request['boton'];
    	return View::make('configuracion.permission',compact('idRole','idModulo'));
    }

    public function create(Request $request)
    {
    	echo "menu index: ".$request['menuIndex'];
    	return "";

    }
}

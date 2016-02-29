<?php

namespace App\Http\Controllers;
use View;
use DB;
use Illuminate\Http\Request;
use App\cms_access;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class configController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $modulos=DB::table('cms_accesses')->where('active',1)->get();
    	return view('configuracion/index',compact('modulos'));
    }

    public function store(Request $request)
    {
    	$idRole=$request['id'];
    	$idModulo=$request['boton'];
    	return View::make('configuracion.registerPermission',compact('idRole','idModulo'));
    }

    public function create(Request $request)
    {
    	echo "menu index: ".$request['menuIndex'];
    	return "";

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth',['only'=>'admin']);
    }*/

    public function index()
    {
    	return view('frontend.index');
    } 
    
}

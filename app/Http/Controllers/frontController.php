<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontController extends Controller
{


    public function index()
    {
    	return view('frontend.home');
    } 
    
    public function historia()
    {
    	return view('frontend.historia');
    } 
    
    public function mision()
    {
    	return view('frontend.mision');
    }
      public function vision()
    {
        return view('frontend.vision');
    }
}

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
    	return view('frontend.home');
    } 
    
    
}

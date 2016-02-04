<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontController extends Controller
{
    //
    public function index()
    {
    	return view('index');
    }

    public function contacto()
    {
    	return view('contacto');
    }

    public function galeria()
    {
    	return view('galeria');
    }

    public function login()
    {
        return view('login');
    }
   
}

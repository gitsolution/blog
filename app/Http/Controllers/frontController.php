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

    public function panel()
    {
        return view('panelAdmin');
    }

    public function flot()
    {
        return view('flot');
    }

    public function morris()
    {
        return view('morris');
    }

    public function tables()
    {
        return view('tables');
    }

    public function form()
    {
        return view('form');
    }

    public function panelWell()
    {
        return view('panelWell');
    }

    public function buttons()
    {
        return view('buttons');
    }

    public function notification()
    {
        return view('notification');
    }

    public function typography()
    {
        return view('typography');
    }

    public function icons()
    {
        return view('icons');
    }

    public function grid()
    {
        return view('grid');
    }

    public function prueba()
    {
        return view('prueba');
    }
}

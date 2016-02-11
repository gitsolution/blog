<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class rolesController extends Controller
{
    public function index()
	{	
		return view('roles.rolesform');
	}

    public function create()
    {
    	return view('roles.create');
    }

}

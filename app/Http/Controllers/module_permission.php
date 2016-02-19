<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class module_permission extends Controller
{
	public function index($id)
	{
		return "";
	}

    public function edit($id)
    {
    	$user = User::find($id);
        return view('modules/index')->with('user',$user);
    }

    public function store()
    {
    	return "store";
    }

    public function create()
    {
        return view('modules/moduloFrom');
    }

   
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
	public function index()
	{
        $users=\App\User::All();
		return view('usuario.index',compact('users'));
	}

    public function create()
    {
    	return view('usuario.create');
    }

    public function store(Request $request)
    {
        	\App\User::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>bcrypt($request['password']),
            ]);

            return redirect('usuario')->with('message','store');
    }
}

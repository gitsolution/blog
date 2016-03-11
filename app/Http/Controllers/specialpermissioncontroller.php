<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class specialpermissioncontroller extends Controller
{
	public function store()
	{
		
	}
    /*public function index($id)
    {
        $nombre=DB::table('usr_profiles')->where('id',$id)->select('name', 'lastName')->first();
        $nombreCompleto=$nombre->name." ".$nombre->lastName;
        //$roles=DB::table('usr_roles')->where('active',1)->select('id', 'title')->get();
        //$chek=DB::table('usr_login_roles')->where('id_login',$id)->where('active',1)->select('id_role')->get();

        return View::make('specialPermission/asignacionpermiso',compact('id','nombreCompleto'));
	}*/
}

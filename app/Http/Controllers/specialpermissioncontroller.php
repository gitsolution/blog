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

    public function index($id)
    {
         $nombre=DB::table('usr_profiles')->where('id',$id)->first();
         $nombreCompleto=$nombre->name." ".$nombre->lastname;
         $id=$nombre->id;

         $rolesmodules=DB::table('user_module_rol')->where('active',1)->orderBy('id_role','ASC')->paginate(20);
         $roles=DB::table('usr_roles')->where('active',1)->get();
         $modules=DB::table('sys_modules')->where('active',1)->get();

        return View::make('specialPermission/index',compact('nombreCompleto','id','rolesmodules','roles','modules'));
    }

    /*public function index($id)
    {
        $nombre=DB::table('usr_profiles')->where('id',$id)->select('name', 'lastName')->first();
        $nombreCompleto=$nombre->name." ".$nombre->lastName;
        //$roles=DB::table('usr_roles')->where('active',1)->select('id', 'title')->get();
        //$chek=DB::table('usr_login_roles')->where('id_login',$id)->where('active',1)->select('id_role')->get();

        return View::make('specialPermission/asignacionpermiso',compact('id','nombreCompleto'));
	}*/
    public function edit($idu,$idr,$idm)
    {
        echo $idu." ".$idr." ".$idm;

        $json = DB::table('user_module_rol')->whereid($idr)->first();
        $json=json_decode($json->access_granted,true);
            //dd($json);
        return view('specialPermission/registerpermission')->with('json',$json);
    }
}

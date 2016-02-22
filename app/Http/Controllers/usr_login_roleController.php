<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usr_login_role;
use App\usr_role;
use App\User;
use Redirect;
use Session;
use DB;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class usr_login_roleController extends Controller
{
	 public function index()
	{	
		
	}

     public function store(Request $request)
    {
       $b=0;
       $c=0;
       $rolActive = array();
       $rolNoActive=array();
        
       $dato = $request['vRoles'];
       $num=count($dato);        
       $roles=DB::table('usr_roles')->select('id')->get();

        foreach ($roles as $rol) 
        {
            for($i=0;$i<$num;$i++)
            {
                if($rol->id==$dato[$i])
                {  
                    $rolActive[$c]=$rol->id;
                    //echo "Active: ".$rolActive[$c]."<br>";
                    $b=1;
                    \App\usr_login_role::create([
                        'id_login'=>$request['idUser'],
                        'id_role'=>$dato[$i],
                        'active'=>'1',
                        'register_by'=>Auth::User()->id,
                        'modify_by'=>Auth::User()->id,
                    ]);   
                }
            }

            if($b==0)
            {
                $rolNoActive[$c]=$rol->id;
                //echo "No: ".$rolNoActive[$c]."<br>";
                \App\usr_login_role::create([
                        'id_login'=>$request['idUser'],
                        'id_role'=>$rol->id,
                        'active'=> '0',
                        'register_by'=>Auth::User()->id,
                        'modify_by'=>Auth::User()->id,
                    ]);
            }
            $b=0;
            $c++;
        }

        return view('layouts.app');
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function edit($id)
    {
        $roles=usr_role::find($id);
        return view('roles.rolesform')->with('roles',$roles);
    }

    public function update($id,Request $request)
    {
        $dato = $request['vRoles'];
        $num=count($dato);
        $roles=DB::table('usr_roles')->select('id')->get();
        $c=0;
        $b=0;
        
        foreach ($roles as $rol) 
        {
            for($i=0;$i<$num;$i++)
            {
                if($rol->id==$dato[$i])
                {  
                    $rolActive[$c]=$rol->id;
                    //echo "Active: ".$rolActive[$c]."<br>";
                    $usrRole= new usr_login_role;
                    $usrRole->where('id_login', '=', $id)->where('id_role','=',$rolActive[$c])
                    ->update(['active' => 1]); 
                    $b=1;
                    
                }
            }

            if($b==0)
            {
                $rolNoActive[$c]=$rol->id;
                $usrRole= new usr_login_role;
                $usrRole->where('id_login', '=', $id)->where('id_role','=',$rolNoActive[$c])
                ->update(['active' => 0]); 
                
            }
            $b=0;
            $c++;
        }

        return view('layouts.app');

    }

     public function delete($id)
    {
        $query=usr_role::destroy($id);

        return view('layouts.app');
    }

    public function updateRol($id)
    {
        $user = User::find($id);
        $idUser=$id;

        return View::make('roles/asignacionRoles',compact('user','idUser'));
    }
}

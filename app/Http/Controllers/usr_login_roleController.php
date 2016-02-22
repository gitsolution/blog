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
       $vRol;
       $c=0;
       $dato = $request['vRoles'];
       $num=count($dato);        
       $roles=DB::table('usr_roles')->select('id')->get();
        
       echo "total: ".$num."<br>";

        foreach ($roles as $rol) 
        {
        for($i=0;$i<$num;$i++)
        {      
        if($c<$num)
        {  
            echo "dato[$i]".$dato[$i]."<br>";
            foreach ($roles as $rol) 
            {
                echo $rol->id."==".$dato[$i]."<br>";
                if($rol->id==$dato[$i])
                {   echo "iguales".$rol->id."<br>";
                    $b=1;
                    break;
                }

                else
                { echo "no iguales".$rol->id."<br>";
                    $b=0;
                    $vRol=$rol->id;
                }
            }

            $c++;
            if($b==1)
            {
                //echo "Con valor 1: ".$dato[$i]."<br>";                
                /*\App\usr_login_role::create([
                        'id_login'=>$request['idUser'],
                        'id_role'=>$dato[$i],
                        'active'=>'1',
                        'register_by'=>Auth::User()->id,
                        'modify_by'=>Auth::User()->id,
                    ]);   
                    */
            }

            else
            {
                //echo "Con valor 0: ".$vRol=$rol->id."<br>"; 
                /*
                \App\usr_login_role::create([
                        'id_login'=>$request['idUser'],
                        'id_role'=>$rol->id,
                        'active'=> '0',
                        'register_by'=>Auth::User()->id,
                        'modify_by'=>Auth::User()->id,
                    ]);   */

            }
            $b=0;
            }
            }
            break;
         }
       
       return ;


       for($i=0;$i<$num;$i++)
       {
           \App\usr_login_role::create([
                    'id_login'=>$request['idUser'],
                    'id_role'=>$dato[$i],
                    'active'=> '1',
                ]);   
           
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
        /*actualiza rol*/
       $dato = $request['vRoles'];
        $num=count($dato);   

      
        for($i=0;$i<$num;$i++)
        {
            $userExist = DB::table('usr_login_roles')->where('id_login',$id)->where('id_role',$dato[$i])->select('id_login','id_role','active')->first();

           var_dump($userExist);
           
        }

        return;


        echo $idRole = $request['id'];
        $usrRole= new usr_login_role;
        $usrRole->where('id_login', '=', $id)
        ->update(['id_role' => $idRole]);

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

<?php

namespace App\Http\Controllers;
use View;
use DB;
use Illuminate\Http\Request;
use App\cms_access;
use App\usr_role;
use App\sys_module;
use App\usr_module_rol;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class configController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $roles = DB::table('usr_roles')->where('active','1')->lists('title', 'id');
        $modulos=DB::table('sys_modules')->where('active',1)->get();

        return View::make('configuracion.index',compact('roles','modulos'));
    }

    public function store(Request $request)
    {
        $json='{';
        if($request['idRole']!=null)
        {  
            $n = count($request['role']); 
            for ($i=0; $i <$n ; $i++) 
            {   
                $json.='"'.$request['role'][$i].'":true,';
            }
            $json = substr($json, 0, -1);
            $json=$json.'}';


            usr_module_rol::create([
                            'id_role'=>$request['idRole'],
                            'id_sysmodules'=>$request['idModule'],
                            'active'=>'1',
                            'access_granted'=>$json,
                            'register_by'=>Auth::User()->id,
                            'modify_by'=>Auth::User()->id,
                        ]);

            $roles = DB::table('usr_roles')->where('active','1')->lists('title', 'id');
            $modulos=DB::table('sys_modules')->where('active',1)->get();

            return View::make('configuracion.index',compact('roles','modulos'));
            /*$idRole=$request['idRole'];
            $idModulo=$request['idModule'];
            $nRol=DB::table('usr_roles')->where('id',$idRole)->first();
            $nombreRol=$nRol->title;
            $nModulo=DB::table('sys_modules')->where('id',$idModulo)->first();   
            $nombreModulo=$nModulo->title;
            return View::make('configuracion.registerPermission',compact('idRole','idModulo','nombreRol','nombreModulo'));*/
        }

        else
        {
            $idRole=$request['id'];
            $idModulo=$request['boton'];
            $nRol=DB::table('usr_roles')->where('id',$idRole)->first();
            $nombreRol=$nRol->title;
            $nModulo=DB::table('sys_modules')->where('id',$idModulo)->first();
            if($nModulo!=null){  
            $nombreModulo=$nModulo->title;}else{$nombreModulo="";}

            $json=DB::table('user_module_rol')->whereid_role($idRole)->whereid_sysmodules($idModulo)->first();
            if($json!=null){
                $json=(json_decode($json->access_granted, true));
            }

            else{
                $access_granted='{"Guardar":false,"Eliminar":false,"Editar":false,"Nuevo":false}';
                $json=(json_decode($access_granted, true));
            }
               

            return View::make('configuracion.registerPermission',compact('idRole','idModulo','nombreRol','nombreModulo','json'));
            }
    	
    }

    public function create(Request $request)
    {
        
    	echo "menu index: ".$request['menuIndex'];
    	return "";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class specialpermissioncontroller extends Controller
{
	public function store(Request $request)
	{  
        dd($request['jsn']);
        if($request['idRole']!=null)
        { 
            $json=$request['jsn'];
            $v=DB::table('user_module_rol')->whereid_role($request['idRole'])->whereid_sysmodules($request['idModule'])->first();
            if($v!=null)
            {
                $query=DB::table('user_module_rol')->whereid_role($request['idRole'])->whereid_sysmodules($request['idModule'])->update(array('access_granted' => $json));
            }

            else
            {
                $json=$request['jsn'];
                usr_module_rol::create([
                                'id_role'=>$request['idRole'],
                                'id_sysmodules'=>$request['idModule'],
                                'active'=>'1',
                                'access_granted'=>$json,
                                'register_by'=>Auth::User()->id,
                                'modify_by'=>Auth::User()->id,
                            ]);
            }
                        
                             
            $roles = DB::table('usr_roles')->where('active',1)->lists('title', 'id');
            $modulos=DB::table('sys_modules')->whereid_parent(0)->whereactive(1)->get();
            $submodulos=DB::table('sys_modules')->whereactive(1)->where('id_parent','>',0)->get();

            return View::make('configuracion.index',compact('roles','modulos','submodulos'));
        }

        else
        {
            $idModulo=$request['boton'];

            $nModul=DB::table('sys_modules')->where('id',$idModulo)->first();
            $nModuls=str_replace(" ","-",trim($nModul->title));
            $path="admin.".$nModuls;
           
            $idRole=$request['id'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            

            $nRol=DB::table('usr_roles')->where('id',$idRole)->first();
            $nombreRol=$nRol->title;
            $nModulo=DB::table('sys_modules')->where('id',$idModulo)->first();
            if($nModulo!=null){  
            $nombreModulo=$nModulo->title;}else{$nombreModulo="";}
            $json=DB::table('cms_accesses')->whereid_sysmodule($idModulo)->select('title','active')->get();
            
            return View::make('configuracion.registerPermission',compact('idRole','idModulo','nombreRol','nombreModulo','json','path'));
            }
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
    public function edit($idu,$idm,$idr)
    {
        $json = DB::table('user_module_rol')->whereid($idm)->first();
        $json=json_decode($json->access_granted,true);

        return view('specialPermission/registerpermission')->with('json',$json);
    }
}

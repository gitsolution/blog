<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\specialPermission;
use Auth;

class specialpermissioncontroller extends Controller
{
	public function store(Request $request)
	{  
        if($request['idr']!=null && $request['idm']!=null&& $request['b']==0)
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
                specialpermission::create([
                                'id_user'=>$request['idu'],
                                'id_usermolrol'=>$request['idm'],
                                'access'=>$json,
                                'active'=>'1',
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
            $json=$request['jsn'];
            $query=DB::table('special_permissions')->whereid_user($request['idu'])->whereid_usermolrol($request['idm'])->update(array('access' => $json));

            $idModulo=$request['boton'];

            $id=$request['idu'];
            $nombre=DB::table('usr_profiles')->where('id',$id)->first();
            $nombreCompleto=$nombre->name." ".$nombre->lastname;
            $id=$nombre->id;

            $rolesmodules=DB::table('user_module_rol')->where('active',1)->orderBy('id_role','ASC')->paginate(20);
            $roles=DB::table('usr_roles')->where('active',1)->get();
            $modules=DB::table('sys_modules')->where('active',1)->get();
          
        return View::make('specialPermission/index',compact('nombreCompleto','id','rolesmodules','roles','modules'));
            /*$nModul=DB::table('sys_modules')->where('id',$idModulo)->first();
            $nModuls=str_replace(" ","-",trim($nModul->title));
            $path="admin.".$nModuls;
           
            $idRole=$request['id'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            

            $nRol=DB::table('usr_roles')->where('id',$idRole)->first();
            $nombreRol=$nRol->title;
            $nModulo=DB::table('sys_modules')->where('id',$idModulo)->first();
            if($nModulo!=null){  
            $nombreModulo=$nModulo->title;}else{$nombreModulo="";}
            $json=DB::table('cms_accesses')->whereid_sysmodule($idModulo)->select('title','active')->get();

            return View::make('configuracion.registerPermission',compact('idRole','idModulo','nombreRol','nombreModulo','json','path'));*/
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

    public function edit($idu,$idr,$idm)
    {
        $jsonp=DB::table('special_permissions')->whereid_user($idu)->whereid_usermolrol($idm)->first();
        if($jsonp!=null)
        {
            $json=$jsonp->access;
            $json=json_decode($json,true);
        }

        else
        {
         $json = DB::table('user_module_rol')->whereid($idm)->first();
         $json=json_decode($json->access_granted,true);
        }

        $nRol=DB::table('usr_roles')->where('id',$idr)->first();
        $nombreRol=$nRol->title;
        $nModulo=DB::table('sys_modules')->where('id',$idm)->first();
        if($nModulo!=null){  
        $nombreModulo=$nModulo->title;}else{$nombreModulo="";}
        $b=DB::table('special_permissions')->whereid_user($idu)->whereid_usermolrol($idm)->first();
        if($b!=null){$b=1;}else{$b=0;}
        return View::make('specialPermission/registerpermission',compact('json','nombreRol','nombreModulo','idr','idm','idu','b'));
    }
}

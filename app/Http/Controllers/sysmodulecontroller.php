<?php

namespace App\Http\Controllers;
use Redirect;
use Session;
use DB;
use App\sys_module;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class sysmodulecontroller extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
	{	
		$cms = sys_module::All();
		return view('sysmodules.index',compact('cms'));		
	}

	public function store(Request $request)
    {    	    	
    	$activado='0';
        if($request ['ChekActivacion']== "on")
        {
        	echo "El check esta activado";
          	$activado='1';
        }

    	sys_module::create([
    		'title'=>$request['title'],
            'description'=>$request['description'],
    		'active'=>$activado,
            'register_by'=>Auth::User()->id,
            'modify_by'=>Auth::User()->id,
    	]);
        
        Session::flash('message','Módulo agregado correctamente');    
        
       	return Redirect::to("admin/module");

    }

    public function create()
    {
    	return view('sysmodules.cmsForm');
    }

    public function edit($id)
    {
        $cms=sys_module::find($id);
        return view('sysmodules.cmsform',['cms'=>$cms]);
    }

    public function editpermision($id)
    {
        $module=DB::table('sys_modules')->where('active',1)->select('title')->first();
        $nModule=DB::table('sys_modules')->where('id',$id)->first();
        $nameModule=$nModule->title;
        $json='{"agregar":false,"guardar":false,"modificar":false,"nuevo":false}';
        $json=(json_decode($json, true));
        return View::make('sysmodules/modulespermission',compact('id','json','nameModule'));
    }

    public function update($id,Request $request){
        $activado='0';
        if($request ['ChekActivacion']== "on")
        {
            $activado='1';
        }

        $cms = sys_module::find($id);
        $cms->active=$activado;
        $cms->fill($request->all());      
        $cms->save();
           
        Session::flash('message','Módulo actualizado correctamente');    

        return Redirect::to("admin/module");
    }

    public function activar($id,$active)
    {
        $priv=1;    
        if($active=='True')
        { 
            $active = 1;
        }

        else
        { $active = 0; }

        $roles = DB::table('sys_modules')->where('id', '=',$id)->update(['active'=>$active]);             
        Session::flash('message','Módulo actualizado');    
        return redirect('/admin/module');
    }

}

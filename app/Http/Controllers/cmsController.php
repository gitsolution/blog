<?php
namespace App\Http\Controllers;
use Redirect;
use Session;
use DB;
use App\sys_module;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class cmsController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
	{	
		$cms = sys_module::All();
		return view('cms.index',compact('cms'));		
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
        
       return Redirect::to("admin/cms");

    }

    public function create()
    {
    	return view('cms.cmsForm');
    }

    public function edit($id)
    {
        $cms=sys_module::find($id);
        return view('cms.cmsform',['cms'=>$cms]);
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
            
        return Redirect::to("admin/cms");
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
        Session::flash('message','Rol actualizado');    
        return redirect('/admin/cms')->with('message','store');
    }*/

}

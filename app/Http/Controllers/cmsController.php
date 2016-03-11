<?php
namespace App\Http\Controllers;
use Redirect;
use Session;
use DB;
use App\sys_module;
use App\cms_access;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class cmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {               
        $json='{';
         
            $n = count($request['module']); 
            for ($i=0; $i <$n ; $i++) 
            {   
                $json.='"'.$request['module'][$i].'":true,';
            }
            $json = substr($json, 0, -1);
            $json=$json.'}';


            cms_access::create([
                            'id_sysmodule'=>$request['idModule'],
                            'title'=>$request['nameModule'],
                            'description'=>"",
                            'active'=>'1',
                            'rules'=>$json,
                            'register_by'=>Auth::User()->id,
                            'modify_by'=>Auth::User()->id,
                        ]);

            $cms = sys_module::All();
            return view('sysmodules.index',compact('cms'));     
        }

}

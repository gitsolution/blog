<?php

namespace App\Http\Controllers;
use Redirect;
use Session;
use DB;
use App\cms_access;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class cmsController extends Controller
{
    public function index()
	{	
		$cms = cms_access::All();
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

    	cms_access::create([
    		'title'=>$request['title'],
            'description'=>$request['description'],
    		'active'=>$activado,
    	]);
        
       return Redirect::to("admin/cms");

    }

    public function create()
    {
    	return view('cms.cmsForm');
    }

    public function edit($id)
    {
        $cms=cms_access::find($id);
        return view('cms.cmsform',['cms'=>$cms]);
    }

    public function update($id,Request $request){
        $cms = cms_access::find($id);
        $cms->fill($request->all());      
        $cms->save();
            
        return Redirect::to("admin/cms");
    }


}

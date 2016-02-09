<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use DB;

class MediaController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('auth');
    }  


    //
	public function index(){
		$flag='1';	
		$medias =  DB::table('med_albums')->where('active','=', $flag)->orderBy('order_by','DESC')->paginate(20);
		return view('media/index',compact('medias'));
	}

	public function medianew(){
		return view('media/mediaform');
	}


	public function create(){
		return view('mediaform');
	}

	public function store(Request $request){
		$publish= 0;
		$index_page=0;
		if($request['publish']='on')
		{
			$publish=1;
		}


		if($request['index_page']='on')
		{
			$index_page=1;
		}

		 
			\App\Media::create([
			'title'=>$request['title'],
			'description'=>$request['description'],
			'order_by'=>$request['order_by'],
			'uri'=>$publish,
			'publish'=>$request['publish'],
			'publish_date'=>$request['publish_date'],
			'index_page'=>$index_page,
			'hits'=>'0',//$request['hits'],
			'active'=>'1',//$request['active'],
			'register_by'=>'1',//$request['resgiter_by'],
			'modify_by'=>'1',//$request['modify_by'], 
			]);
		return redirect('/admin/media')->with('message','store');

	}


	public function show($id){

		return "SHOW ".$id;
	}

	public function edit($id){
			$media = \App\Media::find($id);
			return view('media/mediaform')->with('media',$media);
    	}

	public function update($id,Request $request){
        $media = \App\Media::find($id);
		$media->fill($request->all());		
		$media->save();
		Session::flash('message','Usuario Actualizado Correctamente');		
		return redirect('/admin/media')->with('message','store');
	}

	public function delete($id){
        $media = \App\Media::find($id);
		$media->active=0;
		$media->save();
		Session::flash('message','Usuario Eliminado Correctamente');		
		return redirect('/admin/media')->with('message','store');
	}


	public function order($id, $orderBy, $no){
		// Actualizamos el registro con id
		$flag=1;
		$this->setOrderItem($flag,$orderBy, $no);
	
		$media = \App\Media::find($id);
		$media->order_by=$no;
		$media->save();		
		Session::flash('message','Ordén del Albúm actualizado');		
		return redirect('/admin/media')->with('message','store');
	}


	public function setOrderItem($flag,$orderBy, $no)
	{
		$noAux=$no;
		$media = DB::table('med_albums')->where('active','=', $flag)->where('order_by', '=',$no)->get();		
		if($orderBy=='Up'){	
			$noAux=$noAux-1;
			}else { 		
			$noAux=$noAux+1;			
		}
				var_dump($noAux);
		$media =  Null;	
		$media = DB::table('med_albums')->where('active','=', $flag)->where('order_by', '=',$no)->update(['order_by'=>$noAux]);		
	}

	public function publicate($id,$pub){
		$flag=1;
		if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
		$media = DB::table('med_albums')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);			       
	    Session::flash('message','Ordén del Albúm actualizado');		
		return redirect('/admin/media')->with('message','store');
	}

  



	public function index_page($id,$ind){
       	$flag=1; 
			if($ind=='True'){ $ind = 1;}else{ $ind = 0; }
		$media = DB::table('med_albums')->where('active','=', $flag)->where('id', '=',$id)->update(['index_page'=>$ind]);			       
	    Session::flash('message','Ordén del Albúm actualizado');		
		return redirect('/admin/media')->with('message','store');
	
	}
	public function destroy($id)
	{
	
	}


}

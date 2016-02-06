<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class MediaController extends Controller
{
    //
	public function index(){
		$medias = \App\Media::All();
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

	public function destroy($id)
	{
	
	}

}

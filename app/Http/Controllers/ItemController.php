<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Session;
use DB;


class ItemController extends Controller
{
    //
	public function index(){

		$flag='1';	
		
		$media = DB::table('med_albums')->orderBy('order_by','DESC')->get();
        $items =  DB::table('med_pictures')->where('active','=', $flag)->orderBy('order_by','DESC')->paginate(20);
		return view('pics/index',['items'=>$items,'medias'=>$media]);
		
		//return view('pics/index',compact('items'));
	}

	public function itemnew(){
		$flag='1';	
		$media = DB::table('med_albums')->where('active','=', $flag)->orderBy('order_by','DESC')->get();			
        $item = null;
        return view('pics/itemform',['item'=>$item,'media'=>$media]);		
	}


	public function create($id_album){	
		$flag='1';	
		$media = DB::table('med_albums')->where('active','=', $flag)->orderBy('order_by','DESC')->get();
		$item = null;		
        return view('pics.itemform',['item'=>$item,'media'=>$media]);	
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
		     //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
 		

 		//obtenemos el nombre del archivo
       //$nombre = $file->getClientOriginalName();
        $media = \App\Media::find($request->id_album);
 		$path=$media->path.uniqid().'.'.$file->getClientOriginalExtension();
 		$extension = $file->getClientOriginalExtension();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($path,  \File::get($file));
	   $flag=1;	   
       $orderBy =  (DB::table('med_pictures')->where('active','=', $flag)->max('order_by'))+1;		 
			\App\Item::create([
			'id_album'=>$request['id_album'],	
			'title'=>$request['title'],
			'description'=>$request['description'],
			'uri'=>$path,
			'uri'=>$publish,
			'publish'=>$request['publish'],
			'publish_date'=>$request['publish_date'],
			'path'=>$path,
			'mime_type'=>$extension,
			'extension'=>$extension,
			'hits'=>'0',//$request['hits'],
			'order_by'=>$orderBy,			
			'active'=>'1',//$request['active'],
			'register_by'=>'1',//$request['resgiter_by'],
			'modify_by'=>'1',//$request['modify_by'], 
			]);
		return redirect('/admin/item');

	}


	public function showItems($id_album){
		$media = \App\Media::find($id_album);
		$flag='1';	
		$items =  DB::table('med_pictures')->where('active','=', $flag)->where('id_album','=',$id_album)->orderBy('order_by','DESC')->paginate(20);
		return view('item/index',compact('items'));
	}

	public function show($id){
		$flag='1';	
		$items =  DB::table('med_pictures')->where('active','=', $flag)->orderBy('order_by','DESC')->paginate(20);
		return view('item/index',compact('items'));
	}



	public function edit($id){
		$flag='1';	
		$media = DB::table('med_albums')->where('active','=', $flag)->orderBy('order_by','DESC')->get();
		$item =  \App\Item::find($id); 		
        return view('pics/itemform',['item'=>$item,'media'=>$media]);
		
			//$item = \App\Item::find($id);		
			//return view('item/itemform')->with('item',$item);
    	}

	public function update($id,Request $request){
        $item = \App\Item::find($id);
		$item->fill($request->all());		
		$item->save();
		Session::flash('message','Usuario Actualizado Correctamente');		
		return redirect('/admin/item')->with('message','store');
	}

	public function delete($id){
        $item = \App\Item::find($id);
		$item->active=0;
		$item->save();
		Session::flash('message','Imagen Eliminada Correctamente');		
		return redirect('/admin/item');
	}


	public function order($id, $orderBy, $no){
		// Actualizamos el registro con id
		$flag=1;
		$this->setOrderItem($flag,$orderBy, $no);
	
		$item = \App\Item::find($id);
		$item->order_by=$no;
		$item->save();		
		Session::flash('message','Ordén del Albúm actualizado');		
		return redirect('/admin/item');
	}


	public function setOrderItem($flag,$orderBy, $no)
	{
		$noAux=$no;
		$item = DB::table('med_pictures')->where('active','=', $flag)->where('order_by', '=',$no)->get();		
		if($orderBy=='Up'){	
			$noAux=$noAux-1;
			}else { 		
			$noAux=$noAux+1;			
		}
		$item =  Null;	
		$item = DB::table('med_pictures')->where('active','=', $flag)->where('order_by', '=',$no)->update(['order_by'=>$noAux]);		
	}

	public function publicate($id,$pub){
		$flag=1;
		if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
		$item = DB::table('med_pictures')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);			       
	    Session::flash('message','Ordén del Albúm actualizado');		
		return redirect('/admin/item');
	}

  



	public function index_page($id,$ind){
       	$flag=1; 
			if($ind=='True'){ $ind = 1;}else{ $ind = 0; }
		$item = DB::table('med_pictures')->where('active','=', $flag)->where('id', '=',$id)->update(['index_page'=>$ind]);			       
	    Session::flash('message','Ordén del Albúm actualizado');		
		return redirect('/admin/item');
	
	}
	public function destroy($id)
	{
	
	}


}

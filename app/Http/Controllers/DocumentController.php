<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Redirect;

class DocumentController extends Controller
{
	 public function __construct()
   		 {
        	 $this->middleware('auth');
   		 }  
    
  	 public function index()
   		{
       

    	   	$flag='1';  
             $Document = DB::table('cms_documents')
            ->join('cms_categories', 'cms_categories.id', '=', 'cms_documents.id_category')
            ->select('cms_documents.*', 'cms_categories.title as category')
            ->where('cms_documents.active','=', $flag)
            ->orderBy('order_by','DESC')->paginate(20);    
        	return view('documents/index',compact('Document'));
   		}
	 public function documentynew()
	 {      
      

    		return view('documents/documentform');
    
    }

     public function store(Request $request)
    	{
    		$ChekPubli='0';
        	if($request ['ChekPublicar']== 'on')
        	{
          		$ChekPubli='1';
        	}	

        	$ChekPrivad='0';
        	if($request ['ChekPrivado']== 'on')   
       		{
         		$ChekPrivad='1';
        	}
             $flag=1;
         	$orderBy =  (DB::table('cms_documents')->where('active','=', $flag)->max('order_by'))+1;    
		  	\App\cms_document::create([
          	'id_category' => $request['id_category'],
          	'title' => $request['title'],
          	'resumen'=>$request['resumen'],
          	'content'=>$request['content'],
          	'main_picture'=>$request['main_picture'],
          	'private'=>$ChekPrivad,
          	'publish_date'=>$request['publish_date'],//$request['descripcion'],
          	'publish'=>$ChekPubli,
          	'hits'=>'1',
          	'uri'=>'cadena',//$request['descripcion'],
          	'order_by'=>$orderBy,//$request['descripcion'],
          	'active'=>'1',//$request[''],
          	'register_by'=>'1',//,$request[''],
          	'modify_by'=>'1',
          	
          	]);
                      
          	return redirect('admin/document');
        }


     public function edit($id)
   		{
       		$Document = \App\cms_document::find($id);
       		return view('documents/documentform')->with('Document',$Document);
     	}
     
     public function update($id, Request $request)
     	{
           	$Document = \App\cms_document::find($id);
           	$Document->fill($request->all());
           	$Document->save();
           	Session::flash('message','Usuario Actualizado Correctamente');    
           	return redirect('admin/document')->with('message','store');       
     	}
     public function delete($id)
	    {
          	$Document = \App\cms_document::find($id);
          	$Document->active=0;
          	$Document->save();
        	  Session::flash('message','Usuario Eliminado Correctamente');    
      	    return redirect('admin/document')->with('message','store');
        }

    public function deletePicture($id)
      {
          $Document = \App\cms_category::find($id);
          $Document->main_picture="";
          $Document->save();
          Session::flash('message','Imagen Eliminada Correctamente'); 
          return view('documents.documentform',['Document'=>$Document]);
      }




  	 public function privado($id,$priv)
  		{
    		$flag=1;
    
    		if($priv=='True'){ $priv = 1;}else{ $priv = 0; }
    		$Document = DB::table('cms_documents')->where('active','=', $flag)->where('id', '=',$id)->update(['private'=>$priv]);             
      		Session::flash('message','Ordén del Albúm actualizado');    
    		return redirect('/admin/document')->with('message','store');
  		}
  	 public function publicate($id,$pub)
  	 	{
    		$flag=1;
    		if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
    		$Document = DB::table('cms_documents')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);    
    		Session::flash('message','Ordén del Albúm actualizado');
    		return redirect('/admin/document')->with('message','store');
  		}
  	 public function order($id, $orderBy, $no)
    	{
        	// Actualizamos el registro con id
         	$flag=1;
          	$this->setOrderItem($flag,$orderBy, $no);
          	$Document = \App\cms_document::find($id);
          	$Document->order_by=$no;
          	$Document->save();   
          	Session::flash('message','Ordén del Albúm actualizado');    
          	return redirect('/admin/document')->with('message','store');
  		}

  	public function setOrderItem($flag,$orderBy, $no)
  		{
    		$noAux=$no;
    		$Document = DB::table('cms_documents')->where('active','=', $flag)->where('order_by', '=',$no)->get();    
    		if($orderBy=='Up')
    		{ 
      			$noAux=$noAux-1;
      		}
      	else 
      		{     
      			$noAux=$noAux+1;      
    		}
        	var_dump($noAux);
    		$Document =  Null; 
    		$Document = DB::table('cms_documents')->where('active','=', $flag)->where('order_by', '=',$no)->update(['order_by'=>$noAux]);   
 		}
    
}

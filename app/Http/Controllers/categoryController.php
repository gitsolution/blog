<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;

class categoryController extends Controller
{
     public function __construct()
   		 {
        	 $this->middleware('auth');
   		 }  
    
  	 public function index()
   		{
       
    	   	$flag='1';  
    	   	$Catego =  DB::table('cms_categories')->where('active','=', $flag)->orderBy('order_by','DESC')->paginate(20);
    
        	return view('categories/index',compact('Catego'));
   		}
	 public function categorynew()
	 	{
    		return view('categories/categoryform');
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
         	$orderBy =  (DB::table('cms_categories')->where('active','=', $flag)->max('order_by'))+1;    
		  	\App\cms_category::create([
          	'id_section'=>$request['id_section'],
          	'title' => $request['title'],
          	'resumen'=>$request['resumen'],
          	'content'=>$request['content'],
          	'main_picture'=>$request['main_picture'],
          	'private'=>$ChekPrivad,
          	'publish_date'=>$request['publish_date'],//$request['descripcion'],
          	'publish'=>$ChekPubli,
          	'uri'=>'cadena',//$request['descripcion'],
          	'order_by'=>$orderBy,//$request['descripcion'],
          	'active'=>'1',//$request[''],
          	'register_by'=>'1',//,$request[''],
          	'modify_by'=>'1',
          	'register_by'=>'1',
          	]);
                      
          	return redirect('admin/category');
        }

     public function edit($id)
   		{
       		$Catego = \App\cms_category::find($id);
       		return view('categories/categoryform')->with('Catego',$Catego);
     	}
     
     public function update($id, Request $request)
     	{
           	$Catego = \App\cms_category::find($id);
           	$Catego->fill($request->all());
           	$Catego->save();
           	Session::flash('message','Usuario Actualizado Correctamente');    
           	return redirect('admin/category')->with('message','store');       
     	}

     public function delete($id)
	    {
          	$Catego = \App\cms_category::find($id);
          	$Catego->active=0;
          	$Catego->save();
        	  Session::flash('message','Usuario Eliminado Correctamente');    
      	    return redirect('admin/category')->with('message','store');
        }


  	 public function privado($id,$priv)
  		{
    		$flag=1;
    
    		if($priv=='True'){ $priv = 1;}else{ $priv = 0; }
    		$Catego = DB::table('cms_categories')->where('active','=', $flag)->where('id', '=',$id)->update(['private'=>$priv]);             
      		Session::flash('message','Ordén del Albúm actualizado');    
    		return redirect('/admin/category')->with('message','store');
  		}

  	 public function publicate($id,$pub){
    		$flag=1;
    		if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
    		$Catego = DB::table('cms_categories')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);    
    		Session::flash('message','Ordén del Albúm actualizado');
    		return redirect('/admin/category')->with('message','store');
  		}


 	 public function order($id, $orderBy, $no)
    	{
        	// Actualizamos el registro con id
         	$flag=1;
          	$this->setOrderItem($flag,$orderBy, $no);
          	$Catego = \App\cms_category::find($id);
          	$Catego->order_by=$no;
          	$Catego->save();   
          	Session::flash('message','Ordén del Albúm actualizado');    
          	return redirect('/admin/category')->with('message','store');
  		}

  	public function setOrderItem($flag,$orderBy, $no)
  		{
    		$noAux=$no;
    		$Catego = DB::table('cms_categories')->where('active','=', $flag)->where('order_by', '=',$no)->get();    
    		if($orderBy=='Up')
    		{ 
      			$noAux=$noAux-1;
      		}
      	else 
      		{     
      			$noAux=$noAux+1;      
    		}
        	var_dump($noAux);
    		$Catego =  Null; 
    		$Catego = DB::table('cms_categories')->where('active','=', $flag)->where('order_by', '=',$no)->update(['order_by'=>$noAux]);   
 		}

}

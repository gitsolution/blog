<?php

namespace App\Http\Controllers;

use Storage;
use File;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;
use Session;
use Redirect;


class categoryController extends Controller
{
     public function __construct()
   		 {
        	 $this->middleware('auth');
   		 }  
    
  	 public function index()
   		{
       
    	   	$flag='1';  
              $Catego = DB::table('cms_categories')
            ->join('cms_sections', 'cms_categories.id_section', '=', 'cms_sections.id')            
            ->select('cms_categories.*', 'cms_sections.title as section')
            ->where('cms_categories.active','=', $flag)            
            ->orderBy('order_by','DESC')->paginate(20);


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
              $file = $request->file('file'); 
          if($file!=""){       
          $file = $request->file('file');     
          $path='store/CAT/'.uniqid().'.'.$file->getClientOriginalExtension();
          //indicamos que queremos guardar un nuevo archivo en el disco local
           Storage::disk('local')->put($path,  File::get($file));
          }
          else{
            $path="";
          }


		  	\App\cms_category::create([
          	'id_section'=>$request['id_section'],
          	'title' => $request['title'],
          	'resumen'=>$request['resumen'],
          	'content'=>$request['content'],
          	'main_picture'=>$path,
          	'private'=>$ChekPrivad,
          	'publish_date'=>$request['publish_date'],//$request['descripcion'],
          	'publish'=>$ChekPubli,
          	'uri'=>'cadena',//$request['descripcion'],
          	'order_by'=>$orderBy,//$request['descripcion'],
          	'active'=>'1',//$request[''],
          	'register_by'=>Auth::User()->id,//,$request[''],
          	'modify_by'=>Auth::User()->id,
          	
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
            $isUpImg=false;
            $Catego = \App\cms_category::find($id);
            $path=null;
            $file = $request->file('file');    

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



            if($file!=""){
            $main_picture=$Catego->main_picture;

            $path='store/CAT/'.uniqid().'.'.$file->getClientOriginalExtension();                        
            
              if($main_picture!=$path)
              {
                $isUpImg=true;
                //indicamos que queremos guardar un nuevo archivo en el disco local
                Storage::disk('local')->put($path,  File::get($file));

              }
            }
          
            $Catego->fill($request->all());            
            if($isUpImg){
            $Catego->main_picture=$path;
            }
            $Catego->private=$ChekPrivad;
            $Catego->publish=$ChekPubli;
            $Catego->modify_by=Auth::User()->id;

           	$Catego->save();
           	Session::flash('message','Categoria Actualizada Correctamente');    
           	return redirect('admin/category');       
     	}

     public function delete($id)
	    {
          	$Catego = \App\cms_category::find($id);
          	$Catego->active=0;
          	$Catego->save();
        	  Session::flash('message','Categoria Eliminada Correctamente');    
      	    return redirect('admin/category');
        }


      public function deletePicture($id)
      {
          $Section = \App\cms_section::All();
          $Catego = \App\cms_category::find($id);
          $Catego->main_picture="";
          $Catego->save();
          Session::flash('message','Imagen Eliminada Correctamente'); 
          return view('categories.categoryform',['Catego'=>$Catego, 'Section'=>$Section]);

      }



  	 public function privado($id,$priv)
  		{
    		$flag=1;
    
    		if($priv=='True'){ $priv = 1;}else{ $priv = 0; }
    		$Catego = DB::table('cms_categories')->where('active','=', $flag)->where('id', '=',$id)->update(['private'=>$priv]);             
      		Session::flash('message','Ordén dela Categoria actualizada');    
    		return redirect('/admin/category');
  		}

  	 public function publicate($id,$pub){
    		$flag=1;
    		if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
    		$Catego = DB::table('cms_categories')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);    
    		Session::flash('message','Ordén dela categoria actualizada');
    		return redirect('/admin/category');
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
          	return redirect('/admin/category');
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


        public function getData($id){
          $ListCategoties = DB::table('cms_categories')
            ->select('cms_categories.id', 'cms_categories.title as category')
            ->where('cms_categories.active','=', $flag)            
             ->where('cms_categories.id_section','=', $id)            
            ->orderBy('order_by','DESC')->get();
            return $ListCategoties;
    }


}

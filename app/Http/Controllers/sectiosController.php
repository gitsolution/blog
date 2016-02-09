<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB;
use Session;
use Redirect;

class sectiosController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }  
    
  public function index()
   {
       
    $flag='1';  
    $Sections =  DB::table('cms_sections')->where('active','=', $flag)->orderBy('order_by','DESC')->paginate(20);
    
        return view('sections/index',compact('Sections'));
   }


  public function section()
    {
        $types = \App\cms_type::All();
        $Sections=null;
        return view('sections.sectionform',['Sections'=>$Sections,'types'=>$types]);
    }

    
  public  function store(Request $request)
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
         $orderBy =  (DB::table('cms_sections')->where('active','=', $flag)->max('order_by'))+1;
      
     

     
		  \App\cms_section::create([
          'id_type'=>$request['id_type'],
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
                      

          return redirect('admin/sections');
      }

  public function edit($id)
      {
          $types = \App\cms_type::All();
          $Section = \App\cms_section::find($id);
          return view('sections.sectionform',['Section'=>$Section, 'types'=>$types]);
      }


  public function update($id, Request $request)
      {
            $Section = \App\cms_section::find($id);
            $Section->fill($request->all());
            $Section->save();
            Session::flash('message','Usuario Actualizado Correctamente');    
            return redirect('admin/sections')->with('message','store');       
      }


  public function delete($id)
      {
          $Section = \App\cms_section::find($id);
          $Section->active=0;
          $Section->save();
          Session::flash('message','Usuario Eliminado Correctamente');    
          return redirect('/admin/sections')->with('message','store');
      }

  public function order($id, $orderBy, $no)
      {
          // Actualizamos el registro con id
          $flag=1;
          $this->setOrderItem($flag,$orderBy, $no);
  
          $Section = \App\cms_section::find($id);
          $Section->order_by=$no;
          $Section->save();   
          Session::flash('message','Ordén del Albúm actualizado');    
          return redirect('/admin/sections')->with('message','store');
  }

  public function setOrderItem($flag,$orderBy, $no)
  {
    $noAux=$no;
    $Section = DB::table('cms_sections')->where('active','=', $flag)->where('order_by', '=',$no)->get();    
    if($orderBy=='Up'){ 
      $noAux=$noAux-1;
      }else {     
      $noAux=$noAux+1;      
    }
        var_dump($noAux);
    $Section =  Null; 
    $Section = DB::table('cms_sections')->where('active','=', $flag)->where('order_by', '=',$no)->update(['order_by'=>$noAux]);   
  }


  public function privado($id,$priv){
    $flag=1;
    
    if($priv=='True'){ $priv = 1;}else{ $priv = 0; }
    $Section = DB::table('cms_sections')->where('active','=', $flag)->where('id', '=',$id)->update(['private'=>$priv]);             
      Session::flash('message','Ordén del Albúm actualizado');    
    return redirect('/admin/sections')->with('message','store');
  }

  public function publicate($id,$pub){
    $flag=1;
    if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
    $Section = DB::table('cms_sections')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);             
      Session::flash('message','Ordén del Albúm actualizado');    
    return redirect('/admin/sections')->with('message','store');
  }



}

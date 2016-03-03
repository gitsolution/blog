<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class commentController extends Controller
{	  
        public function __construct()
    {
        $this->middleware('auth');
    }  
    
  public function index()
   {
    $flag='1';  
 
    $Coments = DB::table('cms_comments')
      ->join('cms_documents', 'cms_documents.id', '=', 'cms_comments.id_document')            
      ->select('cms_comments.*', 'cms_documents.title as titleDoc')
      ->where('cms_comments.active','=', $flag)            
      ->orderBy('created_at','DESC')->paginate(20);
      return view('comments/index',compact('Coments'));

   }

      public function store(Request $request){
          $uri=$request->uri;         
          
           $id_comment =(DB::table('cms_comments')->max('id_comment'))+1;
           
    	  \App\cms_comment::create([
          
          'id_comment'=>$id_comment,
          
          'id_document' => $request['id_doc'],
          'mail'=>$request['mail'],
          'content'=>$request['content'],
           'publish'=>'0',
           'active'=>'1',
         ]);
    	  return redirect('Blog/'.$uri);
    }

  public function publicate($id,$pub){

    $flag=1;
    if($pub=='True'){ $pub = 1;}else{ $pub = 0; }
    $Coments = DB::table('cms_comments')->where('active','=', $flag)->where('id', '=',$id)->update(['publish'=>$pub]);             
     
    return redirect('admin/comments');
  }

  public function delete($id)
      {
          $Coments = \App\cms_comment::find($id);
          $Coments->active=0;
          $Coments->save();
          Session::flash('message','Comentario Eliminado Correctamente');    
          return redirect('admin/comments');
      }

}

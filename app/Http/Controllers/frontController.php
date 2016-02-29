<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\contactoRequest;
use App\Http\Controllers\Controller;
use Mail;

class frontController extends Controller
{
  /*
   public function __construct()
    {
        $this->middleware('auth');
    }
  */
    
  
    public function store(contactoRequest $request)
    {
            $data['name']=$request['name'];
            $data['email']=$request['email'];
            $data['phone']=$request['phone'];
            $data['asunt']=$request['asunt'];

            Mail::send('mails.contacto', ['data' => $data], function($mail)
                use($data){
                 $mail->subject('Comentario');
                 $mail->to('analista_de_credito@hotmail.com')->bcc('romanalbores@gmail.com');
            });

            return view('frontend.contacto');
    }
    

    public function storecotizacion(Request $request)
    {
        $data['name']=$request['name'];
        $data['name']=$request['email'];
        $data['phone']=$request['phone'];
        $data['montoaproximado']=$request['montoaproximado'];
        $data['exampleInputAmount']=$request['exampleInputAmount'];
        $data['oficioprofesion']=$request['oficioprofesion'];
        $data['destinocredito']=$request['destinocredito'];
        $data['asunt']=$request['asunt'];

        Mail::send('mails.frmcotizacion', ['data' => $data], function($mail)
        use($data){
            $mail->subject('Cotización');
            $mail->to('iver.fabi13@gmail.com');
        });

        return "Correo enviado";
    }

    public function Contacto()
    {
        return view('frontend.contacto');
    }

    public function cotizacion()
    {
        return view('frontend.frmcotizacion');
    }


public function index()
    {
        $flag=1;
        $private=1;
        $publish=1;

        $Sections = null;
        $Categories = null;
        $uri='Inicio';
        
        
        $id_section =  (DB::table('cms_sections')->where('active','=', $flag)->where('uri','=', $uri)->max('id'));             
      
      //  $Sections = \App\cms_section::find($id_section);
          $Sections =  DB::table('cms_sections')->where('active','=', $flag)->where('publish','=', $publish)->where('id','=', $id_section)->get();             
      
            $Categories = DB::table('cms_categories')
            ->join('cms_sections', 'cms_categories.id_section', '=', 'cms_sections.id')            
            ->select('cms_categories.*', 'cms_sections.title as section')
            ->where('cms_categories.active','=', $flag)                    
            ->where('cms_categories.id_section','=', $id_section)                        
            ->where('cms_categories.publish','=', $publish)                                    
            ->orderBy('order_by','DESC')->paginate(20);

        return view('frontend.home',['Categories'=>$Categories, 'Sections'=>$Sections]);
    }

    public function BlogList()
    {
        $flag=1;
        $Sections = null;
        $Categories = null;
        $uri='Inicio';
        
        $id_section =  (DB::table('cms_sections')->where('active','=', $flag)->where('uri','=', $uri)->max('id'));             
        $Sections = \App\cms_section::find($id_section);

            $Categories = DB::table('cms_categories')
            ->join('cms_sections', 'cms_categories.id_section', '=', 'cms_sections.id')            
            ->select('cms_categories.*', 'cms_sections.title as section')
            ->where('cms_categories.active','=', $flag)            
            ->where('cms_categories.id_section','=', $id_section)                        
            ->orderBy('order_by','DESC')->paginate(20);

        return view('frontend.home',['Categories'=>$Categories, 'Sections'=>$Sections]);
    }


public function page(Request $request)
    {

       $uri  = $request->path();
       if( $uri=='admin'){
	       return view('home');
        }
  		else{
        $flag=1;
        $Sections = null;
        $Categories = null;               
        $id_section =  (DB::table('cms_sections')->where('active','=', $flag)->where('uri','=', $uri)->max('id'));             
        $Sections = \App\cms_section::find($id_section);
      return view('frontend.page',['Categories'=>$Categories, 'Sections'=>$Sections]);
       }
  	 
       
       }



public function section($option){

$flag=1;
        $Sections = null;
        $Categories = null;
        $uri=$option;
        
        $id_section =  (DB::table('cms_sections')->where('active','=', $flag)->where('uri','=', $uri)->max('id'));             
        $Sections = \App\cms_section::find($id_section);

            $Categories = DB::table('cms_categories')
            ->join('cms_sections', 'cms_categories.id_section', '=', 'cms_sections.id')            
            ->select('cms_categories.*', 'cms_sections.title as section')
            ->where('cms_categories.active','=', $flag)            
            ->where('cms_categories.id_section','=', $id_section)                        
            ->orderBy('order_by','DESC')->paginate(20);

        return;
      //  return view('frontend.home',['Categories'=>$Categories, 'Sections'=>$Sections]);

}

public function category($option){
        $Sections = null;
        $Categories = null;
        $uri=$option;
        
            $Categories = DB::table('cms_categories')
            ->where('cms_categories.active','=', $flag)            
            ->where('cms_categories.uri','=', $uri)                        
            ->orderBy('order_by','DESC')->paginate(20);

        return;


}

public function document($option){

        $Documents = null;
        $uri=$option;
        
            $Categories = DB::table('cms_documents')
            ->where('cms_documents.active','=', $flag)            
            ->where('cms_documents.uri','=', $uri)                        
            ->orderBy('order_by','DESC')->paginate(20);

        return;




}

public function listCategory($option){
        $Sections = null;
        $Categories = null;
        $uri=$option;
        
        $id_section =  (DB::table('cms_sections')->where('active','=', $flag)->where('uri','=', $uri)->max('id'));             
        //$Sections = \App\cms_section::find($id_section);

            $Categories = DB::table('cms_categories')
            ->join('cms_sections', 'cms_categories.id_section', '=', 'cms_sections.id')            
            ->select('cms_categories.*', 'cms_sections.title as section')
            ->where('cms_categories.active','=', $flag)            
            ->where('cms_categories.id_section','=', $id_section)                        
            ->orderBy('order_by','DESC')->paginate(20);

        return;

}

public function listDocument($option){

        $Sections = null;
        $Categories = null;
        $uri=$option;
            $Categories = DB::table('cms_categories')
            ->join('cms_sections', 'cms_categories.id_section', '=', 'cms_sections.id')            
            ->select('cms_categories.*', 'cms_sections.title as section')
            ->where('cms_categories.active','=', $flag)            
            ->where('cms_categories.id_section','=', $id_section)                        
            ->orderBy('order_by','DESC')->paginate(20);

        return;

}

public function listGalleries(){
$flag='1';  
        $items =  DB::table('med_pictures')
            ->join('med_albums', 'med_pictures.id_album', '=', 'med_albums.id')            
            ->select('med_pictures.*', 'med_albums.title as album', 'med_albums.description as descripcion')        
            ->where('med_albums.active','=', $flag)
            ->where('med_pictures.active','=', $flag)        
            ->orderBy('med_pictures.order_by','DESC')->paginate(20);



        $media =  DB::table('med_albums')
            ->join('med_pictures', 'med_albums.id', '=', 'med_pictures.id_album')            
            ->select('med_albums.*', 'med_pictures.path as pic', 'med_pictures.id_album as idal')        
            ->where('med_albums.active','=', $flag)
            ->where('med_pictures.active','=', $flag)        
            ->orderBy('med_albums.order_by','DESC')->paginate(20);
            return view('frontend.galery',['items'=>$items, 'media'=>$media]);

}

public function galleries($option){
        $uri = $option;        
        $flag='1';  
        $items =  DB::table('med_pictures')
            ->join('med_albums', 'med_pictures.id_album', '=', 'med_albums.id')            
            ->select('med_pictures.*', 'med_albums.title as album')        
            ->where('med_albums.active','=', $flag)
            ->where('med_pictures.active','=', $flag) 
            ->where('med_albums.uri','=',$uri)       
            ->orderBy('med_pictures.order_by','DESC')->paginate(20);
            //return view('pics/index',['items'=>$items]);
}
 


}

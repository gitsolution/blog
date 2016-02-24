<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontController extends Controller
{

    public function index()
    {
        $titulo=DB::table('cms_sections')->select('title','resumen')->where('id','=',1)->first();
    	return view('frontend.home',compact('titulo'));
    }
    
    public function historia()
    {
        $titulo=DB::table('cms_sections')->select('title','resumen')->where('id','=',1)->first();
     $roles=DB::table('med_albums')
            ->leftjoin('med_pictures', 'med_albums.id', '=', 'med_pictures.id_album')            
            ->select('med_pictures.title', 'med_pictures.path', 'med_pictures.description')
            ->where('med_pictures.id_album','=','3' )
            ->where('med_pictures.active','=','1' )
            ->get(); 
            $titul=array();
            $picture=array();
              $description=array();
            $i=0;
           
        foreach ($roles as $rol) 
        {
               $titul[$i]=$rol->title;
            $picture[$i]=$rol->path; 
            $description[$i]=$rol->description; 
            $i++;
        }
    	return view('frontend.historia',compact('titulo','titul','picture','description','roles'));
    } 
    
    public function mision()
    {
        $Mision=DB::table('cms_sections')->select('title','resumen','main_picture')->where('id','=',6)->first();
    	return view('frontend.mision',compact('Mision'));
    }
      public function vision()
    {
        $vision=DB::table('cms_sections')->select('title','resumen','main_picture')->where('id','=',6)->first();
        return view('frontend.vision',compact('vision'));
    }
}

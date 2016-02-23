@extends('frontend.index')
<?php
 $titulo=DB::table('cms_sections')->select('title','resumen')->where('id','=',7)->first();

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

  ?>
@section('content')
   <!-- Page Content -->
    <div class="container">
  
        <hr>

        <hr>
<h1> <?php echo $titulo->title;  ?></h1>
  <div class="col-md-6">

    <p><?php echo $titulo->resumen;  ?> </p>

  </div>
       <div class="col-md-6">

    <p><?php echo $titulo->resumen;  ?> </p>
    <br>
  <br>
  </div>

            <div class="form-group">
            @for($i=0; $i< count($titul);$i++) 
               @if($i%2==1)
               <div class="row">@endif
         
            <div class="col-md-6">
            <img class=" img-center" width="500px" height="400px" src="<?php echo $picture[$i]?>" alt="">
                          
                <h2> <?php echo $titul[$i];  ?></h2>
                <p>
                    <?php echo $description[$i];  ?>
                </p>
          </div>
          
                @if($i%2==1)
            </div>@endif
          @endfor
         
          </div>
        <!-- /.row -->
        </div>
@stop
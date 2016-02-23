@extends('frontend.index')
<?php
 $Mision=DB::table('cms_sections')->select('title','resumen','main_picture')->where('id','=',6)->first();
  ?>
@section('content')



    <!-- Page Content -->
    <div class="container">

        <br><br>
        <div class="row">
            <div class="col-sm-6">
            <br>
                <h2>   <?php echo $Mision->title;  ?></h2>
                <p> <?php echo $Mision->resumen ;?>  </p>
               </div>
            
             <div class="col-sm-6 text-center">
            <div class="contimage"> 
             <br>
                <img  src="<?php echo $Mision->main_picture?>" alt="">  
             </div>         
             </div>


 
        </div>


@stop
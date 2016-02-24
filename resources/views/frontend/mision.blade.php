@extends('frontend.index')
@section('content')

    <!-- Page Content -->
    <div class="container">
        @if($Mision!=null)
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
         @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
        </div>


@stop
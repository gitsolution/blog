@extends('frontend.index')
<?php
 
  ?>
@section('content')



    <!-- Page Content -->
    <div class="container">
     @if($vision!=null)
        <br><br>
        <div class="row">
            <div class="col-sm-6">
            <br>
                <h2>   <?php echo $vision->title;  ?></h2>
                <p> <?php echo $vision->resumen ;?>  </p>
               </div>
            
             <div class="col-sm-6 text-center">
            <div class="contimage"> 
             <br>
                <img  src="<?php echo $vision->main_picture?>" alt="">  
             </div>         
             </div>


 
        </div>
        @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
    </div>

@stop
@extends('frontend.index')
<?php
 
  ?>
@section('content')



    <!-- Page Content -->
    <div class="container">
     @if($vision!=null)
        <br><br>
        <div class="row">
            <div class="col-sm-6" style="word-wrap: break-word; text-align: justify;">
            <br>
                <h2>   <?php echo $vision->title;  ?></h2>
                <p> <?php echo $vision->resumen ;?>  </p>
               </div>
            
             <div class="col-sm-6 text-center">
             
             <br><br><br>
              @if($vision->main_picture==null)
              <div></div>
                     <div class="col-md-12">
                      <img class=" img-center" width="100px"; height="200px" src="../../../store/CAT/nodisponible.png ?>">
                      </div>
              @else
                <img  src="<?php echo $vision->main_picture?>" alt="">
              @endif      
             </div>


 
        </div>
        @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
    </div>

@stop
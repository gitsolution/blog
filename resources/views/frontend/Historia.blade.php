@extends('frontend.index')
@section('content')
   <!-- Page Content -->
   @if($titulo!=null && $roles!=null)
    <div class="container">
  
        <hr>

        <hr>

            <div class="form-group">
            @for($i=0; $i< count($titul);$i++) 
              
         
            <div class="col-md-12" style="word-wrap: break-word; text-align: justify;">
              @if($picture[$i]==null)
              <div></div>
                     <div class="col-md-12">
                      <img class=" img-center" width="100px"; height="200px" src="../../../store/CAT/nodisponible.png ?>">
                      </div>
              @else
                <img class=" img-center" width="200px" height="200px" src="<?php echo $picture[$i]?>" alt="">
              @endif
                            
                  <h2> <?php echo $titul[$i];  ?></h2>
                  <p>
                      <?php echo $description[$i];  ?>
                  </p>
             </div>

          @endfor
         
          </div>
        <!-- /.row -->
        </div>
        @else
          <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>

      @endif
@stop
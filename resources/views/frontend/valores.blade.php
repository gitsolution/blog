@extends('frontend.index')
@section('content')

    <!-- Page Content -->
    <div class="container">
        @if($valores!=null)
            <br><br>
            <div class="row">
                 
            <div class="col-sm-7" style="word-wrap: break-word; text-align: justify;">
              <br>
                <h2> <?php echo $valores->title;  ?></h2>
                <p> <?php echo $valores->resumen ;?>  </p>
            </div>
                
                 <div class="col-sm-5">
                 <br><br><br>
                 @if($valores->main_picture==null)
              <div></div>
                     <div class="col-md-12">
                      <img class=" img-center" width="100px"; height="200px" src="../../../store/CAT/nodisponible.png ?>">
                      </div>
              @else
                    <img  src="<?php echo $valores->main_picture?>" alt="">   
              @endif
                 </div>


     
            </div>
<div class="row">

            <div class="form-group">
         @for($i=0; $i< count($titul);$i++) 
             @if($i==3)
                <?php echo "&nbsp<br><br>" ?>
              @endif
            <div class="col-md-4" style="text-align: justify;">
            <img class=" img-center" src="<?php echo $picture[$i]?>" alt="">
                          
                <h2> <?php echo $titul[$i];  ?></h2>
                
                    <?php echo $description[$i];  ?>
          </div>
          @endfor
         
          
        </div>
</div>
            
         @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
        </div>


@stop
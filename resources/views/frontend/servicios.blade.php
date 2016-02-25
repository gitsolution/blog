@extends('frontend.index')
@section('content')

    <!-- Page Content -->
    <div class="container">

      <br><br><br><br><br><br>
        @if($titulo!=null && $titul!=null && $rol!=null)
           <div class="form-group">
         @for($i=0; $i< count($titul);$i++) 
          @if($i==3)
            <?php echo "&nbsp<br><br>" ?>
          @endif
            <div class="col-md-4" style="float: left; word-wrap: break-word; text-align: justify;">
            <img class=" img-center" src="<?php echo $picture[$i]?>" alt="">
                          
                <h2> <?php echo $titul[$i];  ?></h2>
                <p>
                    <?php echo $description[$i];  ?>
                </p>
            </div>
          @endfor
         
          
        </div>
         @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
        </div>


@stop
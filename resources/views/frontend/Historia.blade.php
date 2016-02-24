@extends('frontend.index')
@section('content')
   <!-- Page Content -->
   @if($titulo!=null && $roles!=null)
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
        @else
          <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>

      @endif
@stop
@extends('frontend.index')
@section('content')
<!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header">
        <div class="container">           
        <img src="img/microfinanzas.png" class="img-responsive" class="img">           
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">
     @if($titulo!=null)
        <hr>

        <div class="row">
            <div class="col-sm-8" style="word-wrap: break-word;">
                <h2>   <?php
                   
                    echo $titulo->title;
                     ?></h2>
                <p>
                    <?php 
                    echo $titulo->resumen ;?>
                </p>
                <p>
                    <a class="btn btn-default btn-lg" href="#">Ver mas&raquo;</a>
                </p>
            </div>
            <div class="col-sm-4">
                <h2>Contact Us</h2>
                <address>
                    <strong>Start Bootstrap</strong>
                    <br>3481 Melrose Place
                    <br>Beverly Hills, CA 90210
                    <br>
                </address>
                <address>
                    <abbr title="Phone">P:</abbr>(123) 456-7890
                    <br>
                    <abbr title="Email">E:</abbr> <a href="mailto:#">name@example.com</a>
                </address>
            </div>
        </div>
        <!-- /.row -->
<br>
        
 <div class="form-group">
         @for($i=0; $i< count($titul);$i++) 
               @if($i==3)
                     
               <div class="row">@endif
     
     
            <div class="col-md-4">
            <img class=" img-center" src="<?php echo $picture[$i]?>" alt="">
                          
                <h2> <?php echo $titul[$i];  ?></h2>
                <p>
                    <?php echo $description[$i];  ?>
                </p>
          </div>
          
                @if($i==3)
            </div>@endif
          @endfor
         
          
        </div>
        @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
        </div>
        <!-- /.row -->
        </div>
@stop
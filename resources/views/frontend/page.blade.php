@extends('frontend.index')
@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="row">
        <div class="col-md-8" style="text-align: justify;">     @if(isset($Sections))
    
            
                <h2>   <?php
                   
                    echo $Sections->title;
                     ?></h2>
                <p>
                    <?php 
                    echo $Sections->resumen; ?>
                </p>
                <p>
                    <?php 
                    echo $Sections->content; ?>
                </p>
                <p>
                    <a class="btn btn-default btn-lg" href="#">Ver mas&raquo;</a>
                </p>
        
                
        
      
<br>
    
        @else

       
            <br><br><br><br>
            
              
          <h2>No existe contenido en esta sección</h2>
        @endif
            </div>
<div class="col-md-4">
 
 @include('frontend.frmcotizacion')
 </div>
            </div>
        </div>

@stop
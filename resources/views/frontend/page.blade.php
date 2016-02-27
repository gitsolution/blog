@extends('frontend.index')
@section('content')
<!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
    <header class="business-header">
    
    </header>
    <!-- Page Content -->
    <div class="container">
     @if(isset($Sections))
        <hr>

        <div class="row">
            <div class="col-sm-8" style="word-wrap: break-word; text-align: justify;">
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
            </div>
            <div class="col-sm-4" style="word-wrap: break-word; text-align: justify;">
                <address style="word-wrap: break-word; text-align: justify;">
                
                </address>
            </div>
        </div>
        <!-- /.row -->
<br>
    
        @else
            <br><br><br><br>
          <h2>No existe contenido en esta sección</h2>
        @endif
        </div>

@stop
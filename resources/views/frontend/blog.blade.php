@extends('frontend.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
 <hr>
        <div class="row">
        <div class="col-md-8" style="text-align: justify;">     
        @if(isset($Documents))
        @foreach($Documents as $Doc)
            <h4>   
            <?php echo $Doc->title; ?></h4>
          		<p>
                    <?php 
                    	if($Doc->main_picture!=""){
                    	echo ("<img src='".$Doc->main_picture."' >");
                    }; ?>
                </p>
                
          		<p>
                    <?php 
                    echo $Doc->resumen; ?>
                </p>
                @if(!isset($post))
                    @if($Doc->content!="")
                    <p class="text-left">
                    <a href="Blog/<?php echo $Doc->uri; ?>">Ver más</a>
                    </p>
                    @endif
                 @else
                    <p>
                    <?php 
                    echo $Doc->content; ?>
                  <br>
                  <hr>
                  <p>Comentarios:
        @foreach($coments as $coment)
              @if($coment->iddoc==$Doc->id)
               <div class="comments-container">
                <ul id="comments-list" class="comments-list">
                @if($coment->id <= $coment->id_comment)
               
                <li>
                <div class="comment-main-level">     
        <!-- Contenedor del Comentario -->
                      <div class="comment-box">
                          <div class="comment-head">
                              <h6 class="comment-name by-author"><a href=""><?php echo $coment->mail; ?></a></h6>
                              <span><?php echo $coment->created_at;  ?></span>
                              <i class="fa fa-reply">
                                   <?php  $Uri = 'Blog/'. $Doc->uri;   ?>
                                {!!link_to($Uri, 'Responder',array('class'=>'')) !!} 
                              <i class="fa fa-heart"></i>
                          </div>
                          <div class="comment-content">
                            <?php echo $coment->content;  ?>
                          </div>
                      </div>

                  </div>
                  @endif
     @foreach($coments as $coment2)     
     @if($coment->id==$coment2->id_comment &&$coment->id!=$coment2->id)

 <!--    Respuestas de los comentarios -->
    <ul class="comments-list reply-list">
        <li>     
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
                <div class="comment-head">
                    <h6 class="comment-name"><a href=""><?php echo $coment2->mail; ?></a></h6>
                    <span>hace 10 minutos</span>
                    <i class="fa fa-reply"></i>
                    <i class="fa fa-heart"></i>
                </div>
                <div class="comment-content">
                     <?php echo $coment2->content;  ?>
                </div>
            </div>
        </li>
    </ul>
    @endif
    @endforeach
</li>

        </ul>
        </div>
      
<!--termina maquetacion -->
              
     @endif
  @endforeach
                  
         {!!Form::open(['route'=>['coment.coment.store'],'method'=>'[POST]'])!!} 
            <div class="col-md-1"></div>
            <div class="col-md-7">
            <input type="hidden" name="id_doc" value="<?php echo $Doc->id?>">
             <input type="hidden" name="uri" value="<?php echo $Doc->uri?>">
            <h4>Has un comentario</h4>
            {!!Form::text('mail',null,['class'=>'form-control','placeholder'=>'Email'])!!}
            <br>
            {!!Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Introduce tu comentario'])!!}  <br>  
            {!!Form::submit( 'Comentar',['class'=>'btn btn-primary'])!!}
            </div>
         {!!Form::close()!!} 
    
                </p>                 
                 @endif           
            <br>
    
            @endforeach
        @else
            <br>
            <br>
            <br>
            <br>                          
          <h2>No existe contenido en esta sección</h2>
        @endif
            </div>
<div class="col-md-4">
 
 @include('frontend.frmcotizacion')
 </div>
            </div>
        </div>

@stop
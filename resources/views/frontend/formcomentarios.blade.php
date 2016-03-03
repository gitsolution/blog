
 {!!Form::open(['route'=>'coment.coment.store','method'=>'POST'])!!}
 <div class="col-md-1"></div>
 <div class="col-md-7">
 <h4>Has un comentario</h4>
 {!!Form::text('mail',null,['class'=>'form-control','placeholder'=>'Email'])!!}
<br>
 {!!Form::textarea('content',null,['class'=>'form-control','placeholder'=>'Introduce tu comentario'])!!}  <br>  
 {!!Form::submit( 'Comentar',['class'=>'btn btn-primary'])!!}
 </div>
 {!!Form::close()!!} 
	

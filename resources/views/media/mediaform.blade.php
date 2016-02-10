@extends('layouts.menuAdmin')

@section('content')

 <div class="container-fluid">
<?php  
if(isset($media)) {
	$message='Edit';
	$title=$media->title;
	$description=$media->description;
	$publish_date = date_create($media->publish_date);
	if($media->publish=="0")
	{
		$publish = "";//;		
	}
	else{
		$publish = "checked";//;		
	}	
	$order_by= $media->order_by;


}else{ $message='New'; 
	$media=Null;
	$title=$media;
	$description=$media;
	$publish = $media;
	$publish_date= $media;
	$order_by= $media;
}
 ?>

@if($message=='Edit')
 {!!Form::model($media,['route'=>['admin.media.update',$media->id],'method'=>'PUT'])!!} 
@else
 {!!Form::open(['route'=>'admin.media.store','method','POST'])!!} 
@endif
 <div class="row">
 <div class="form-group" >

 	  {!!Form::label('Nombre:')!!}
 	  {!!Form::text('title',$title,['class'=>'form-control', 'placeholder'=>'Ingresa el Nombre del Albúm'])!!}
 </div>
 <div class="form-group" >
 	  {!!Form::label('Descripción:')!!}
 	  {!!Form::textarea('description',$description,['class'=>'form-control', 'placeholder'=>'Ingresa la Descripción del Albúm'])!!}
</div>
<div class="form-group" >	 
	<div class="col-md-3">
	 	  {!!Form::label('Fecha Publicación:')!!}
	 	  {!!Form::date('publish_date',$publish_date,['class'=>'form-control', 'placeholder'=>'Ingresa la Fecha de Publicación del Albúm'])!!}
	</div>

	<div class="col-md-3">
				        Publicar:
                        <div class="material-switch pull-right">
                            <input id="someSwitchOption1" name="publish" type="checkbox"  <?php echo $publish ?> />
                            <label for="someSwitchOption1" class="label-primary" ></label>
                        </div>
	</div>                        
    <div class="col-md-3">
                        Página de Inicio:
                        <div class="material-switch pull-right">
                            <input id="someSwitchOption2" name="index_page" type="checkbox"  />
                            <label for="someSwitchOption2" class="label-primary"></label>
                        </div>
	</div>
</div>
</div>
<div clas="row">
<div class="form-group" >
	<div class="col-md-12">
	 {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
	</div>
</div>
</div>
 {!!Form::close()!!}
 </div>
@stop

@extends('layouts.app')
@section('content')
 <div class="container-fluid">
<?php  
if(isset($item)) {
	$message='Edit';
	$title=$item->title;
	$description=$item->description;
	$publish_date = date_create($item->publish_date);
	if($item->publish=="0")
	{
		$publish = "";//;		
	}
	else{
		$publish = "checked";//;		
	}	
	$order_by= $item->order_by;


}else{ 
	$message='New'; 
	$item=Null;
	$title=$item;
	$description=$item;
	$publish = $item;
	$publish_date= $item;
	$order_by= $item;

}
 
 ?>




@if($message=='Edit')
 {!!Form::model($item,['route'=>['admin.item.update',$item->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true])!!} 
@else
 {!!Form::open(['route'=>'admin.item.store','method','POST','novalidate' => 'novalidate','files' => true])!!} 
@endif
 <div class="row">
 <div class="form-group" >
  <div class="col-md-3">
                  {!!Form::label('Album','Album:')!!}
                  {!!Form::select('id_album', \App\Media::lists('title','id'),null,['class'=>'form-control select2'])!!}
                <br>
 </div>
</div>
</div>

 <div class="row">

 <div class="form-group" >    
  <div class="col-md-3">
   		   <input type='file' name='file' id="imgLoad" />
  </div>       
 </div>

</div>

 <div class="row">

 <div class="form-group" >    
  
 		<div class="col-md-12">
 		<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-primary">
                        <div class="panel-heading">
                            Imagen
                        </div>
                        <div class="panel-body">
                            <img id="imgUpTo" src="#" alt="Imagen" />
                        </div>
                        <div class="panel-footer">
                        </div>
                </div>      
        </div>                     
 </div>

</div>



 <div class="form-group" >

 	  {!!Form::label('Nombre:')!!}
 	  {!!Form::text('title',$title,['class'=>'form-control', 'placeholder'=>'Ingresa el Nombre de la imagen'])!!}
 </div>
 <div class="form-group" >
 	  {!!Form::label('Descripción:')!!}
 	  {!!Form::textarea('description',$description,['class'=>'form-control', 'placeholder'=>'Ingresa la Descripción de la Imagen'])!!}
</div>
<div class="form-group" >	 
	<div class="col-md-3">
	 	  {!!Form::label('Fecha Publicación:')!!}
	 	  {!!Form::date('publish_date',$publish_date,['class'=>'form-control', 'placeholder'=>'Ingresa la Fecha de Publicación del Albúm'])!!}
	</div>

	<div class="col-md-6">
				        Publicar:
                        <div class="material-switch pull-right">
                            <input id="someSwitchOption1" name="publish" type="checkbox"  <?php echo $publish ?> />
                            <label for="someSwitchOption1" class="label-primary" ></label>
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

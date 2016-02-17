@extends('layouts.app')
@section('content')
 <div class="container-fluid">
<?php  

if(isset($itemMenu)) {
	$message='Edit';
	$title=$itemMenu->title;
  $level=$itemMenu->level;
	$publish_date = date_create($item->publish_date);
	if($itemMenu->publish=="0")
	{
		$publish = "";//;		
	}
	else{
		$publish = "checked";//;		
	}	
	$order_by= $itemMenu->order_by;
    $uri=$itemMenu->$uri;
    $id= $itemMenu->id;
  
}else{ 
	$message='New'; 
	$itemMenu=Null;
	$title=$itemMenu;
	$publish = $itemMenu;
	$order_by= $itemMenu;
	$uri=$itemMenu;
	$id= $itemMenu;
  $level=$itemMenu;
}

 $id_menu=$menu->id;
 $menuname=$menu->title;
$id_parent=$itemMenu->id_parent;
if($id_parent=='')
    {
          $id_parent=0;
    }



 ?>




@if($message=='Edit')
 {!!Form::model($item,['route'=>['admin.itemmenu.update',$itemMenu->id],'method'=>'PUT','novalidate' => 'novalidate','files' => true])!!} 
@else
 {!!Form::open(['route'=>'admin.itemmenu.store','method','POST','novalidate' => 'novalidate','files' => true])!!} 
@endif
 <div class="row">
 <div class="form-group" >
  <div class="col-md-3">
        	  {!!Form::label('Menú: '.$menuname)!!} 
        	   		<input type="hidden" name="id_menu" value="{{ $id_menu }}">        
 </div>
</div>
</div>
 <div class="form-group" >
 	  {!!Form::label('Nombre del Elemento:')!!}
 	  {!!Form::text('title',$title,['class'=>'form-control', 'placeholder'=>'Ingresa el Nombre del elemento del Menú'])!!}
 </div>

 <div class="form-group" >
    {!!Form::label('Uri:')!!}
   <!-- {!!Form::text('uri',$uri,['class'=>'form-control', 'placeholder'=>'Ingresa el Nombre del elemento del Menú'])!!} -->
 </div>
<div class="form-group" >	 
	<div class="col-md-6">
  {!!Form::label('Tamaño del Menú:')!!}
    {!!Form::select('Selecciona', array('Short' => 'Pequeño', 'Medium' => 'Mediano', 'Long' => 'Largo'), 'Short', ['class'=>'form-control select2'] )!!}				
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

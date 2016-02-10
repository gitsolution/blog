@extends('layouts.menuAdmin')
@section('content')
 
 <div class="container-fluid">
  
<?php $message=Session::get('message'); ?>
@if($message=='store')
<div class="alert alert-success alert-dismissible" role="alert">
	Albúm creado exitosamente!!!
</div>
@endif

<div class="row">
	<br>
	<div class="col-md-8"><h3>Catálogo de Galerías</h3></div> <!--divide la columna en 10 y 2-->
	<div class="col-md-2">
 	{!!Form::open()!!}
   
    {!! link_to('admin/itemnew', 'Subir imagenes',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
	</div>
	<div class="col-md-2">
 	{!!Form::open()!!}
   
    {!! link_to('admin/medianew', 'Nueva Galería',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
	</div>
</div>
<div class="row text-center">
	{{$medias->render()}}
</div>
	<div class="row">
		<table class="table table-responsive table-hover"> 
		<thead class="center-text">
			<th>
			ID
			</th>	
			<th>
			Albúm
			</th>
			<th>
			Fecha Publicación
			</th>
			<th>
			Visualizaciones
			</th>
			<th colspan="2" class="center-text">
			Ordén
			</th>
			<th>
			Publicado
			</th>
			<th>
			Inicio
			</th>	
			<th colspan="2" >
			Acciones
			</th>
		</thead>
		@foreach($medias as $med)
				<?php 
				$publish_date = substr($med->publish_date,0,10);
				$down=$med->order_by-1;
				$up=$med->order_by+1;		
				if($down==0)$down=$med->order_by;
				?> 
			<tr>
				<td> {{$med->id}}</td>
				<td> {{$med->title}}</td>
				<td> {{ $publish_date }}</td>		
				<td> {{ $med->hits }}</td>	
				<td> {!! link_to('admin/mediaorder/'.$med->id.'/Down/'.$down, '-',array('class'=>'btn btn-info')) !!}</td>
				<td> {!! link_to('admin/mediaorder/'.$med->id.'/Up/'.$up, '+',array('class'=>'btn btn-info')) !!}</td>
				<td>
				<?php if($med->publish=='1'){?>
				{!!  link_to('admin/mediapub/'.$med->id.'/False', 'Ok',array('class'=>'btn btn-success')) !!}
				<?php } else{ ?>
				{!! link_to('admin/mediapub/'.$med->id.'/True', 'No',array('class'=>'btn btn-warning')) !!}
				<?php } ?>
				</td>
				<td> 
				<?php if($med->index_page=='1'){?>
					{!! link_to('admin/mediaind/'.$med->id.'/False', 'Ok',array('class'=>'btn btn-success')) !!}
				<?php } else{ ?>
					{!! link_to('admin/mediaind/'.$med->id.'/True', 'No',array('class'=>'btn btn-warning')) !!}
				<?php } ?>
				</td>
				<td>{!! link_to('admin/mediaedit/'.$med->id, 'Editar ',array('class'=>'btn btn-info')) !!}</td>         
				<td>{!! link_to('admin/mediadel/'.$med->id, 'Eliminar',array('class'=>'btn btn-danger')) !!}</td>    
		    </td>
			</tr>
		@endforeach
		</table>
	</div>
	<div class="row text-center">
		{{$medias->render()}}
		<?php //echo $medias->render(); ?>
	</div>
</div>
@stop
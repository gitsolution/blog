@extends('layouts.app')
@section('content')
 
<div class="container-fluid">
<div class="row">
	<br>
	<div class="col-md-8"><h3>Catálogo de Galerías</h3></div> <!--divide la columna en 10 y 2-->
	<div class="col-md-2">
 	 
 	</div>
 @can('albums-nuevo')
	<div class="col-md-2">
 	{!!Form::open()!!}
   
    {!! link_to('admin/medianew', 'Nueva Galería',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
	</div>
@endcan
</div>
<div class="row text-center">
	{{$medias->render()}}
</div>
	<div class="table-responsive">
		<table class="table table-hover"> 
		<thead class="center-text">
			<th class="ColumColor">
			ID
			</th>	
			<th class="ColumColor">
			Albúm
			</th>
			<th class="ColumColor">
			Fecha Publicación
			</th>
			@can('albums-imagenes')
				<th class="ColumColor">
				Imágenes
				</th>
			@endcan
			<th class="ColumColor">
			Visualizaciones
			</th>
			@can('albums-ordenar')
				<th colspan="2" class="center-text ColumColor">
				Ordén
				</th>
			@endcan
			@can('albums-publicado')
				<th class="ColumColor text-center">
				Publicado
				</th>
			@endcan
			@can('albums-inicio')
				<th class="ColumColor text-center">
				Inicio
				</th>	
			@endcan
			<th colspan="2" class="ColumColor text-center">
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
				
				@can('albums-imagenes')
					<td>
					&nbsp;&nbsp;&nbsp;&nbsp;{!!link_to('admin/item/'.$med->id, '',array('class'=>'fa fa-upload fa-lg')) !!}
					</td> 
				@endcan        				
				
				<td> {{ $med->hits }}</td>	

				@can('albums-ordenar')
					<td> {!! link_to('admin/mediaorder/'.$med->id.'/Down/'.$down.'/', '',array('class'=>'glyphicon glyphicon-chevron-down')) !!}</td>

					<td> {!! link_to('admin/mediaorder/'.$med->id.'/Up/'.$up.'/', '',array('class'=>'glyphicon glyphicon-chevron-up')) !!}</td>
				@endcan

				@can('albums-publicado')
				<td class="text-center">
				<?php if($med->publish=='1'){?>
				{!!  link_to('admin/mediapub/'.$med->id.'/False/', '',array('class'=>'glyphicon glyphicon-ok')) !!}
				<?php } else{ ?>
				{!! link_to('admin/mediapub/'.$med->id.'/True/', '',array('class'=>'glyphicon glyphicon-ban-circle')) !!}

				<?php } ?>
				</td>
				@endcan

				@can('albums-inicio')
				<td class="text-center"> 
				<?php if($med->index_page=='1'){?>
					{!! link_to('admin/mediaind/'.$med->id.'/False/', '',array('class'=>'fa fa-check-square-o fa-lg')) !!}
				<?php } else{ ?>
					{!! link_to('admin/mediaind/'.$med->id.'/True/', '',array('class'=>'fa fa-square-o fa-lg')) !!}
				<?php } ?>
				</td>
				@endcan

				<td class="text-center">

				@can('albums-editar')
					{!! link_to('admin/mediaedit/'.$med->id, '',array('class'=>'btn btn-primary glyphicon glyphicon-pencil')) !!}
				@endcan

				@can('albums-eliminar')
					{!! link_to('admin/mediadel/'.$med->id, '',array('class'=>'img-responsive btn btn-danger glyphicon glyphicon-trash')) !!}
				@endcan
				</td>    
		    
			</tr>
		@endforeach
		</table>
	</div>
	<div class="row text-center">
		{{$medias->render()}}
		
	</div>
</div>

@stop
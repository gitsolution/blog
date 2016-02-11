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
	<div class="col-md-10"><h3>Catálogo de Galerías</h3></div> <!--divide la columna en 10 y 2-->
	<div class="col-md-2">
 	{!!Form::open()!!}
   
    {!! link_to('admin/itemnew', 'Subir Imagen',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
	</div>
</div>
<div class="row text-center">
	{{$items->render()}}
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
				Imagen
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
			<th colspan="2" >
			Acciones
			</th>
		</thead>
		@foreach($items as $item)
				<?php 
				$publish_date = substr($item->publish_date,0,10);
				$down=$item->order_by-1;
				$up=$item->order_by+1;		
				if($down==0)$down=$item->order_by;
				?> 
			<tr>
				<td> {{$item->id}}</td>
				<td> {{$item->title}}</td>

				<td>
				<div style="width:50px;heigth:50px;">				
				<a href="{{ $item->path }}">	
					<img src='{{ $item->path }}' class="img-responsive"  />  
				</a>
				</div>
				</td>		
				<td> {{ $publish_date }}</td>		
				<td> {{ $item->hits }}</td>	
				<td> {!! link_to('admin/itemorder/'.$item->id.'/Down/'.$down, '-',array('class'=>'btn btn-info')) !!}</td>
				<td> {!! link_to('admin/itemaorder/'.$item->id.'/Up/'.$up, '+',array('class'=>'btn btn-info')) !!}</td>
				<td>
				<?php if($item->publish=='1'){?>
				{!!  link_to('admin/itempub/'.$item->id.'/False', 'Ok',array('class'=>'btn btn-success')) !!}
				<?php } else{ ?>
				{!! link_to('admin/itempub/'.$item->id.'/True', 'No',array('class'=>'btn btn-warning')) !!}
				<?php } ?>
				</td>
				<td>{!! link_to('admin/itemedit/'.$item->id, 'Editar ',array('class'=>'btn btn-info')) !!}</td>         
				<td>{!! link_to('admin/itemdel/'.$item->id, 'Eliminar',array('class'=>'btn btn-danger')) !!}</td>    
		    </td>
			</tr>
		@endforeach
		</table>
	</div>
	<div class="row text-center">
		{{$items->render()}}
		
	</div>
</div>
@stop
@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row">
	<br>
	<div class="col-md-8"><h3>Catálogo de Menús</h3></div> <!--divide la columna en 10 y 2-->
	<div class="col-md-2">
 	 
 	</div>
	<div class="col-md-2">
 	{!!Form::open()!!}
   
    {!! link_to('admin/menunew', 'Nuevo Menú',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
	</div>
</div>
<div class="row text-center">
	{{$menus->render()}}
</div>
	<div class="table-responsive">
		<table class="table table-hover"> 
		<thead class="center-text">
			<th class="ColumColor">
			ID
			</th>	
			<th class="ColumColor">
		    Menu
			</th>
			<th class="ColumColor">
			Elementos
			</th>			 
			<th class="center-text ColumColor">
			Ordén
			</th>
			<th colspan="2" class="ColumColor" >
			Acciones
			</th>
		</thead>
		@foreach($menus as $men)
				<?php 
				$down=$men->order_by-1;
				$up=$men->order_by+1;		
				if($down==0) {
					$down=$men->order_by;
				}
				
				?> 
				<tr>
				<td> {{$men->id}}</td>
				<td> {{$men->title}}</td>
				<td>
				{!!link_to('admin/itemmenu/'.$men->id, '',array('class'=>'glyphicon glyphicon-upload')) !!}
				</td>         								
				<td> {!! link_to('admin/menuorder/'.$men->id.'/Down/'.$down.'/'.$men->id, '-',array('class'=>'btn btn-info')) !!}</td>
				<td> {!! link_to('admin/menuorder/'.$men->id.'/Up/'.$up.'/'.$men->id, '+',array('class'=>'btn btn-info')) !!}</td>
				<td>{!! link_to('admin/menuedit/'.$men->id, 'Editar ',array('class'=>'btn btn-info')) !!}</td>         
				<td>{!! link_to('admin/menudel/'.$men->id, 'Eliminar',array('class'=>'btn btn-danger')) !!}</td>    
		    </td>
			</tr>
		@endforeach

		</table>
	</div>
	<div class="row text-center">
		{{$menus->render()}}
	</div>
</div>
@stop
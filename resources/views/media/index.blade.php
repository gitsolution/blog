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
   
    {!! link_to('admin/medianew', 'Nueva Galería',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
</div>
</div>
<table class="table table-responsive table-hover"> 
<thead>
	<th>
	ID
	</th>	
	<th>
	Albúm
	</th>
	<th>
	Ordén
	</th>
	<th>
	Publicado
	</th>
	<th>
	Vistas
	</th>
	<th>
	Inicio
	</th>	
	<th>
	Fecha Publicación
	</th>
	<th colspan="2">
	Acciones
	</th>
</thead>
 
@foreach($medias as $med)
	<tr>
		<td> {{$med->id}}</td>
		<td> {{$med->title}}</td>
		<td> {{$med->order_by}}</td>
		<td> {{$med->publish}}</td>
		<td> {{$med->hits}}</td>	
		<td> {{$med->index_page}}</td>
		<td> {{$med->publish_date}}</td>
		<td>{!! link_to('admin/mediaedit/'.$med->id, 'Editar ',array('class'=>'btn btn-info')) !!}</td>    
    <td>
		<td>{!! link_to('admin/mediadel/'.$med->id, 'Eliminar',array('class'=>'btn btn-danger')) !!}</td>    
    </td>
	</tr>
@endforeach
 
</table>
</div>

  @stop
@extends('layouts.app')
@section('content')
 <?php $id_menu = $menu->id; 
 if($menu->id_parent=='')
 	{ $id_parent=0;}
 else
 	{$id_parent=$menu->id_parent;}
  ?>
 <div class="container-fluid">
<div class="row">
	<br>
	<div class="col-md-8">
	<h3>Catálogo de Imágenes de {{ $menu->title }}</h3>
	</div> <!--divide la columna en 10 y 2-->
	<div class="col-md-2 text-right">	
 	 {!! link_to('admin/menus', 'Menús',array('class'=>'btn btn-info')) !!}
	</div>
	<div class="col-md-2">
 	{!!Form::open()!!}
   
    {!! link_to('admin/optionmenu/'.$id_menu.'/'.$id_parent, 'Registrar Menú',array('class'=>'btn btn-success')) !!}
   
    {!!Form::close()!!}
	</div>
</div>
<div class="row text-center">
	{{$itemMenus->render()}}
</div>
	<div class="row">
		<table class="table table-responsive table-hover"> 
		<thead class="center-text">
			<th>
			ID
			</th>	
			<th>
			Elemento
			</th>
			<th>
			Sub Menús
			</th>
			<th colspan="2">
			Orden
			</th>
			<th>
			Publicado
			</th>
			<th colspan="2" >
			Acciones
			</th>
		</thead>
		@foreach($itemMenus as $imenu)
				<?php 
				$down=$imenu->order_by-1;
				$up=$imenu->order_by+1;		
				if($down==0)$down=$imenu->order_by;
				?> 
			<tr>
				<td> {{$imenu->id}}</td>
				<td> {{$imenu->title}}</td>
				<td> 
				{!! link_to('admin/itemsubmenu/'.$imenu->id, '',array('class'=>'glyphicon glyphicon-menu-hamburger')) !!} 
				</td>
				<td> {!! link_to('admin/itemmenuorder/'.$imenu->id.'/Down/'.$down, '-',array('class'=>'btn btn-info')) !!}</td>
				<td> {!! link_to('admin/itemmenuorder/'.$imenu->id.'/Up/'.$up, '+',array('class'=>'btn btn-info')) !!}</td>
				<td>
				<?php if($imenu->publish=='1'){?>
				{!!  link_to('admin/itemmenupub/'.$imenu->id.'/False', 'Ok',array('class'=>'btn btn-success')) !!}
				<?php } else{ ?>
				{!! link_to('admin/itemmenupub/'.$imenu->id.'/True', 'No',array('class'=>'btn btn-warning')) !!}
				<?php } ?>
				</td>
				<td>{!! link_to('admin/itemmenuedit/'.$imenu->id, 'Editar ',array('class'=>'btn btn-info')) !!}</td>         
				<td>{!! link_to('admin/itemmenudel/'.$imenu->id, 'Eliminar',array('class'=>'btn btn-danger')) !!}</td>    
		    </td>
			</tr>
		@endforeach
		</table>
	</div>
	<div class="row text-center">
		{{$itemMenus->render()}}
		
	</div>
</div>
@stop
@extends('layouts.menuAdmin')

<?php $message=Session::get('message') ?>

@if($message=='store')
{
	<div class="alert alert-warning" role="alert">
		Usuario creado exitosamente
	</div>
}

@section('content')

	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Operaciones</th>
		</thead>
		@foreach($users as $user)
			<tbody>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
			</tbody>
		@endForeach

	</table>
@stop
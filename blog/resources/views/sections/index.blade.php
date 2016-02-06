@extends('layouts.menuAdmin')
@section('content')
<button class="positionBtn btn btn-primary ">New Section</button>
<br>
<br>
<div class="container-fluid">
<table class="table table-bordered table-hover"> 
<thead>
 <th>
 ID
 </th> 
 <th>
 Tipo
 </th>
 <th>
 Nombre
 </th>
 <th>
 Acceso
 </th>
 <th>
 Publicado
 </th>
 <th>
 Fecha Publicación
 </th>
  <th>
 Order
 </th>
 <th>
 Vistas
 </th>
  <th colspan="2">
 Acciones
 </th>
</thead>


@foreach($Sections as $med)
  <tr>
  <td> {{$med->id}}</td>
  <td> {{$med->id_type}}</td>
  <td> {{$med->title}}</td>
  <td> {{$med->private}}</td>
  <td> {{$med->publish}}</td>
  <td> {{$med->publish_date}}</td>
  <td> {{$med->order_by}}</td>
  <td> {{$med->hits}}</td> 
  
  <td>{!!link_to('section/'.$med->id, 'Editar ',array('class'=>'btn btn-info')) !!}</td>
    {!!Form::open()!!}
    <td>{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}</td>
    {!!Form::close()!!}
 </tr>

@endforeach
 </table> 
 </div>    

@stop
      
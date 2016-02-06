@extends('layouts.menuAdmin')
@section('content')

<div class="container-fluid">
<div class="row">
<br>
<div class="col-md-10"><h3>Catalogo de secciones</h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/sectionsnew', 'Nueva Sección ',array('class'=>'btn btn-success ')) !!}
 {!!Form::close()!!}
</div>
</div>
<br>
<table class="table table-hover table-responsive"> 
<thead >
 <th >
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
 Orden
 </th>
 <th>
 
 </th>
 <th>
 
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
  <td> <boton class="btnIcon"><span class="glyphicon glyphicon-chevron-up"></span></boton></td>
  <td> <boton class="btnIcon"><span class="glyphicon glyphicon-chevron-down"></span></boton></td>
  <td> {{$med->hits}}</td> 
  
  <td>
{!!link_to_route('admin.sections.edit', $title = '', $parameters = $med, $attributes = ['class'=>'btn btn-primary glyphicon glyphicon-pencil'])!!}
  </td>
    {!!Form::open()!!}
    <td>

    <boton class="btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>
    
    </boton></td>
    {!!Form::close()!!}
 </tr>

@endforeach
 </table> 
 </div>  
@stop
      
@extends('layouts.app')
@section('content')

<div class="container-fluid">

<div class="row">
<br>
<div class="col-md-10"><h3>Catálogo de Tipos </h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/typesnew', 'Nueva Tipo ',array('class'=>'btn btn-success ')) !!}
 {!!Form::close()!!}
</div>
    </div>
        <div class="row text-center">
            {{$Types->render()}}
        </div>
    <table class="table table-hover table-responsive"> 
          <thead class="center-text" >
            <th class="ColumColor" >
            ID
            </th> 
            <th  class="ColumColor text-center" >
            Titulo
            </th>
            <th  class="ColumColor text-center" >
            Descripcion
            </th>
            <th class="ColumColor text-center" >
            Creado
            </th>
            <th class="ColumColor text-center"  colspan="2">
            Acciones
            </th>
          </thead>


@foreach($Types as $med)
        <?php 
            $creat = substr($med->created_at,0,10); ?> 
          <tr>
          <td> {{$med->id}}</td>
          <td> {{$med->title}}</td>         
          <td> {{$med->description}}</td> 
          <td> {{$creat}}</td>
          <td class="text-center"> 
          {!! link_to('admin/typesedit/'.$med->id,' ',array('class'=>'btn btn-primary glyphicon glyphicon-pencil')) !!}
          <!--{!!link_to_route('admin.types.edit', $title = '', $parameters = $med->id, $attributes = ['class'=>'btn btn-primary glyphicon glyphicon-pencil'])!!}--></td>
               {!!Form::open()!!}
          <td> 
          {!!link_to('admin/typedel/'.$med->id, '',array('class'=>'btn btn-danger glyphicon glyphicon-remove')) !!}
          </td>
              <!-- {!!Form::close()!!}-->
          </tr>

@endforeach
      </table> 
          <div class="row text-center">
                {{$Types ->render()}}
                
          </div>
  </div>  
@stop
<!--este es el formulario para el index estilos-->
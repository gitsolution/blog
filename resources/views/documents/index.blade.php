@extends('layouts.app')
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
<div class="col-md-10"><h3>Catálogo de Documentos </h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/documentnew', 'Nuevo Documento ',array('class'=>'btn btn-success ')) !!}
 {!!Form::close()!!}
</div>
    </div>
        <div class="row text-center">
            {{$Document->render()}}
        </div>
    <table class="table table-hover table-responsive"> 
          <thead class="center-text" >
            <th class="ColumColor" >
            ID
            </th> 
            <th  class="ColumColor text-center" >
         	  Categoria
            </th>
            <th  class="ColumColor text-center" >
            Titulo
            </th>
            <th class="ColumColor text-center" >
            Acceso
            </th>
            <th class="ColumColor text-center" >
            Publicado
            </th>
            <th class="ColumColor text-center" >
            Fecha Publicación
            </th>
            <th class="ColumColor text-center">
            Vistas
            </th>
            <th class="ColumColor text-center" colspan="2">Orden</th>
            
            <th class="ColumColor text-center" >
            Acciones
            </th>
          </thead>


@foreach($Document as $med)
        <?php 
            $publish_date = substr($med->publish_date,0,10);
            $down=$med->order_by-1;
            $up=$med->order_by+1;   
            if($down==0)$down=$med->order_by;
        ?> 
          <tr>
          <td> {{$med->id}}</td>
          <td> {{$med->id_category}}</td>
          <td> {{$med->title}}</td>
          <td class="text-center"> 
            <?php if($med->private=='1'){?>
                
             {!!link_to('admin/documentPriva/'.$med->id.'/False', '',array('class'=>'glyphicon glyphicon-eye-close')) !!}
             <?php } 
             else{ ?>                    
             {!!link_to('admin/documentPriva/'.$med->id.'/True', '',array('class'=>'glyphicon glyphicon-eye-open')) !!}
                  <?php } ?>
          </td>

          <td class="text-center">
             <?php if($med->publish=='1'){?>
                {!! link_to('admin/documentPublic/'.$med->id.'/False', '',array('class'=>'glyphicon glyphicon-ok')) !!}
              <?php } 
              else{ ?>
                
                {!! link_to('admin/documentPublic/'.$med->id.'/True', '',array('class'=>'glyphicon glyphicon-ban-circle')) !!}
              <?php } ?>
          </td>
          <td class="text-center"> {{$publish_date}}</td>
          <td>{{$med->hits}}</td>
          <td> {!!link_to('admin/documentorder/'.$med->id.'/Up/'.$up, '',array('class'=>'glyphicon glyphicon-chevron-up')) !!}
          </td>
          <td> {!!link_to('admin/documentorder/'.$med->id.'/Down/'.$down, '',array('class'=>'glyphicon glyphicon-chevron-down'))!!}
          </td>
          <td> 
            {!!link_to_route('admin.document.edit', $title = '', $parameters = $med->id, $attributes = ['class'=>'btn btn-primary glyphicon glyphicon-pencil'])!!}
         
           {!!link_to('admin/documentdel/'.$med->id, '',array('class'=>'btn btn-danger glyphicon glyphicon-trash')) !!}
          </td>
               
          </tr>

@endforeach
      </table> 
          <div class="row text-center">
                {{$Document ->render()}}
               
          </div>
  </div>  

@stop
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
<div class="col-md-10"><h3>Catálogo de secciones </h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/sectionsnew', 'Nueva Sección ',array('class'=>'btn btn-success ')) !!}
 {!!Form::close()!!}
</div>
    </div>
        <div class="row text-center">
            {{$Sections->render()}}
        </div>
    <table class="table table-hover table-responsive">
          <thead class="center-text" >
            <th class="ColumColor" >
            ID
            </th> 
            <th  class="ColumColor text-center" >
            Tipo
            </th>
            <th  class="ColumColor text-center" >
            Sección
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
            <th class="ColumColor text-center" colspan="2"></th>
            <th class="ColumColor text-center" >
            Vistas
            </th>
            <th class="ColumColor text-center"  >
            Acciones
            </th>
          </thead>


@foreach($Sections as $med)
        <?php 
            $publish_date = substr($med->publish_date,0,10);
            $down=$med->order_by-1;
            $up=$med->order_by+1;   
            if($down==0)$down=$med->order_by;
        ?> 
          <tr>
          <td> {{$med->id}}</td>
          <td> {{$med->type}}</td>
          <td> {{$med->title}}</td>
          <td class="text-center"> 
             <?php if($med->private=='1'){?>
                
              {!!link_to('admin/sectionsPriva/'.$med->id.'/False', '',array('class'=>'fa fa-lock fa-lg')) !!}
             <?php } 
             else{ ?>                    
              {!!link_to('admin/sectionsPriva/'.$med->id.'/True', '',array('class'=>'fa fa-unlock fa-lg')) !!}
                  <?php } ?>
          </td>
 
          <td class="text-center">
              <?php if($med->publish=='1'){?>
                
                {!! link_to('admin/sectionsPublic/'.$med->id.'/False', '',array('class'=>'glyphicon glyphicon-ok')) !!}
              <?php } 
              else{ ?>
                
                {!! link_to('admin/sectionsPublic/'.$med->id.'/True', '',array('class'=>'glyphicon glyphicon-ban-circle')) !!}
              <?php } ?>
          </td>
          <td class="text-center"> {{$publish_date}}</td>
          
          <td> {!!link_to('admin/sectionorder/'.$med->id.'/Up/'.$up, '',array('class'=>'glyphicon glyphicon-chevron-up')) !!}</td>
          <td> {!!link_to('admin/sectionorder/'.$med->id.'/Down/'.$down, '',array('class'=>'glyphicon glyphicon-chevron-down'))!!}</td>
          <td class="text-center"> {{$med->hits}}</td> 

          <td> {!!link_to_route('admin.sections.edit', $title = '', $parameters = $med->id, $attributes = ['class'=>'btn btn-primary glyphicon glyphicon-pencil'])!!}
           
           {!!link_to('admin/sectiondel/'.$med->id, '',array('class'=>'img-responsive btn btn-danger glyphicon glyphicon-trash')) !!}</td>
              

          </tr>

@endforeach
      </table> 
          <div class="row text-center">
                {{$Sections ->render()}}
                <?php //echo $medias->render(); ?>
          </div>
  </div>  
@stop
<!--este es el formulario para el index estilos-->
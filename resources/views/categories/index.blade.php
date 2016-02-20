@extends('layouts.app')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@section('content')
<div class="container-fluid">
<div class="row">
<br>
<div class="col-md-10"><h3>Catálogo de Categorías </h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/categorynew', 'Nueva Categoria ',array('class'=>'btn btn-success ')) !!}
 {!!Form::close()!!}
</div>
    </div>
        <div class="row text-center">
            {{$Catego->render()}}
        </div>
    <table class="table table-hover table-responsive"> 
          <thead class="center-text" >
            <th class="ColumColor" >
            ID
            </th> 
            <th  class="ColumColor text-center" >
         	Sección
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


    @foreach($Catego as $med)
        <?php 
            $publish_date = substr($med->publish_date,0,10);
            $down=$med->order_by-1;
            $up=$med->order_by+1;   
            if($down==0)$down=$med->order_by;
        ?> 
          <tr>
          <td> {{$med->id}}</td>
          <td> {{$med->section}}</td>
          <td> {{$med->title}}</td>
          <td class="text-center"> 
            <?php if($med->private=='1'){?>
                
             {!!link_to('admin/categoryPriva/'.$med->id.'/False', '',array('class'=>'fa fa-lock fa-lg')) !!}
             <?php } 
             else{ ?>                    
             {!!link_to('admin/categoryPriva/'.$med->id.'/True', '',array('class'=>'fa fa-unlock fa-lg')) !!}
                  <?php } ?>
          </td>

          <td class="text-center">
             <?php if($med->publish=='1'){?>
                {!! link_to('admin/categoryPublic/'.$med->id.'/False', '',array('class'=>'glyphicon glyphicon-ok')) !!}
              <?php } 
              else{ ?>
                
                {!! link_to('admin/categoryPublic/'.$med->id.'/True', '',array('class'=>'glyphicon glyphicon-ban-circle')) !!}
              <?php } ?>
          </td>
          <td class="text-center"> {{$publish_date}}</td>
          <td>{{$med->hits}}</td>
          <td> {!!link_to('admin/categoryorder/'.$med->id.'/Up/'.$up, '',array('class'=>'glyphicon glyphicon-chevron-up')) !!}
          </td>
          <td> {!!link_to('admin/categoryorder/'.$med->id.'/Down/'.$down, '',array('class'=>'glyphicon glyphicon-chevron-down'))!!}
          </td>
          <td> 
            {!!link_to_route('admin.category.edit', $title = '', $parameters = $med->id, $attributes = ['class'=>'btn btn-primary glyphicon glyphicon-pencil'])!!}
         
           {!!link_to('admin/categorydel/'.$med->id, '',array('class'=>'btn btn-danger glyphicon glyphicon-trash')) !!}
          </td>
               
          </tr>

@endforeach
      </table> 
          <div class="row text-center">
                {{$Catego ->render()}}
               
          </div>
  </div>  

@stop
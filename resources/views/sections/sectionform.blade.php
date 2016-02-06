@extends('layouts.menuAdmin')
  @section('content')
       <!---contact-->

<?php  
if(isset($Section)) {
  $botonTitulo='Editar';
 $message='Edit';
 $title=$Section->title;
 $description=$Section->description;
 $publish_date = date_create($Section->publish_date);
 if($Section->publish=="0")
 {
  $ChekPublicar = "";//;  
 }
 else{
  $ChekPublicar = "checked";//;  
 } 
 $order_by= $Section->order_by;


}else{ 
$botonTitulo='Crear';
  $message='New'; 
 $Section=Null;
 $title=$Section;
 $description=$Section;
 $publish = $Section;
 $publish_date= $Section;
 $order_by= $Section;
}
 ?>

@if($message=='Edit')
 {!!Form::model($Section,['route'=>['admin.sections.update',$Section->id],'method'=>'PUT'])!!} 
@else
 {!!Form::open(['route'=>'admin.sections.store','method'=>'POST'])!!}
@endif

<div class="container-fluid">
 
  <div class="container-fluid">
       <div class="row">
            <div class="form-group">
                  <div class="col-md-12"><h3 class="head">SECCION</h3>
                       <p>PAGINA PARA LA SECCION</p></div>
                <div class="col-md-3">
                     
                  {!!Form::label('tipo','Tipo:')!!}
                  {!!Form::select('id_type', [1,2,3], null, ['class'=>'form-control input-md']) !!}
              <br>
                </div>
                <div class="col-md-5">
                  <div class="publiChec">
                      {!!Form::label('privado','Publicar')!!}
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionInfo" name="ChekPublicar" checked="true" type="checkbox"/>
                            <label for="someSwitchOptionInfo" class="label-info"></label>
                        </div>     
                  </div>
                </div>
                       <!---CheckBox-->
                <div class="col-md-3">
                  <div class="priChec">
                      {!!Form::label('privado','Privado')!!}
                      <div class="material-switch pull-right">
                          <input id="someSwitchOptionSuccess" name="ChekPrivado" checked="true" type="checkbox"/>
                          <label for="someSwitchOptionSuccess" class="label-success"></label>
                      </div>           
                  </div>
                </div>
              </div>
          </div>

  <div class="form-group">
      <div class="row">
          <div class="col-md-12">
              {!!Form::label('date','Fecha De Publicación:')!!}  
          </div>
          
          <div class="col-md-3">
              {!!Form::date('publish_date', $publish_date,['class'=>'form-control'])!!}              
          </div>
      </div>
      <br>
      <div class="form-group">
          {!!Form::label('titulo','Titulo:')!!}
          {!!Form::text('title',null,['class'=>'form-control','placeholder'=>''])!!}
      </div>
      <div class="form-group">
          {!!Form::label('resumen','Resumen')!!}
          {!!Form::textarea('resumen',null,['class'=>'form-control','placeholder'=>''])!!}
      </div>
          <div class="form-group">
            {!!Form::label('contenido','Contenido')!!}
            {!!Form::textarea('content',null,['class'=>'form-control','placeholder'=>''])!!}
          </div>
         <div class="form-group">
                     {!!Form::label('Imagen Principal')!!}
                     {!!Form::file('main_picture',['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::submit($botonTitulo,['class'=>'btn btn-danger'])!!}

        {!!Form::close()!!} 
          
  </div>
</div>
  @stop
<!--fin del archivop-->
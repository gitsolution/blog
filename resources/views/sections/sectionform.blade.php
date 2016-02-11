@extends('layouts.app')
  @section('content')
       <!---contact-->

<?php  
if(isset($Section)) 
{
    $botonTitulo='Editar'; // para cambiar de nombre al submit si es editar o guardar
    $message='Edit';
    $id_type=$Section->id_type;
    $title=$Section->title;
    $resumen=$Section->resumen;
    $content=$Section->content;
    $main_picture=$Section->main_picture;
  if($Section->private=="0")
      {
        $ChekPrivado = "";
      }
  else{
        $ChekPrivado = "checked"; 
      } 
    $publish_date = date_create($Section->publish_date);
  if($Section->publish=="0")
      {
        $ChekPublicar = "";  
      }
  else{
        $ChekPublicar = "checked"; 
      } 
    $uri=$Section->uri;
    $hits=$Section->hits;
    $order_by= $Section->order_by;


}

else{ 
    $botonTitulo=' Crear';
    $message='New'; 
    $Section=Null;
    $title=$Section;
    $description=$Section;
    $ChekPrivado=$Section;
    $ChekPublicar = $Section;
    $publish_date= $Section;
    $order_by= $Section;
    $id_type=$Section;
  }
 ?>

@if($message=='Edit')
 {!!Form::model($Section,['route'=>['admin.sections.update',$Section->id],'method'=>'PUT', 'files'=>true])!!} 
@else
 {!!Form::open(['route'=>'admin.sections.store','method'=>'POST', 'file'=>true])!!}
@endif

<div class="container-fluid">
  <div class="container-fluid">
       <div class="row">
            <div class="form-group">
                  <div class="col-md-12"><h3 class="head">SECCION</h3>
                      <p>PAGINA PARA LA SECCION</p>
                  </div>
                <div class="col-md-3">
                  {!!Form::label('tipo','Tipo:')!!}
                  {!!Form::select('id_type', \App\cms_type::lists('title','id'),null,['class'=>'form-control select2'] )!!}
                <br>
                </div>
                <div class="col-md-5">
                  <div class="publiChec">
                      {!!Form::label('privado','Publicar')!!}
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionInfo" name="ChekPublicar" <?php echo $ChekPublicar ?> type="checkbox"/>
                            <label for="someSwitchOptionInfo" class="label-info"></label>
                        </div>     
                  </div>
                </div>
                       <!---CheckBox-->
                <div class="col-md-3">
                  <div class="priChec">
                      {!!Form::label('privado','Privado')!!}
                      <div class="material-switch pull-right">
                          <input id="someSwitchOptionSuccess" name="ChekPrivado" <?php echo $ChekPrivado ?>  type="checkbox"/>
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
          {!!Form::label('Resume','Resumen')!!}
          {!!Form::textarea('resumen',null,['class'=>'form-control','placeholder'=>''])!!}
      </div>
          <div class="form-group">
            {!!Form::label('contenido','Contenido')!!}
            {!!Form::textarea('content',null,['class'=>'form-control','placeholder'=>''])!!}
          </div>
         <div class="form-group">
                     {!!Form::label('Imagen Principal')!!}
                     {!!Form::file('main_picture')!!}
          </div>
          


          {!!Form::submit( $botonTitulo,['class'=>'btn btn-danger'])!!}

        {!!Form::close()!!} 
          
  </div>
</div>
  @stop
<!--formulario para editar y nueva seccion-->
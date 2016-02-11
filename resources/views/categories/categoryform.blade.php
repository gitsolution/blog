@extends('layouts.app')
  @section('content')
       <!---contact-->

<?php  
if(isset($Catego)) 
{
    $botonTitulo='Editar'; // para cambiar de nombre al submit si es editar o guardar
    $message='Edit';
    $id_type=$Catego->id_type;
    $title=$Catego->title;
    $resumen=$Catego->resumen;
    $content=$Catego->content;
    $main_picture=$Catego->main_picture;
  if($Catego->private=="0")
      {
        $ChekPrivado = "";
      }
  else{
        $ChekPrivado = "checked"; 
      } 
    $publish_date = date_create($Catego->publish_date);
  if($Catego->publish=="0")
      {
        $ChekPublicar = "";  
      }
  else{
        $ChekPublicar = "checked"; 
      } 
    $uri=$Catego->uri;
    $hits=$Catego->hits;
    $order_by= $Catego->order_by;


}

else{ 
    $botonTitulo=' Crear';
    $message='New'; 
    $Catego=Null;
    $title=$Catego;
    $description=$Catego;
    $ChekPrivado=$Catego;
    $ChekPublicar = $Catego;
    $publish_date= $Catego;
    $order_by= $Catego;
    $id_type=$Catego;
  }
 ?>

@if($message=='Edit')
 {!!Form::model($Catego,['route'=>['admin.category.update',$Catego->id],'method'=>'PUT'])!!} 
@else
 {!!Form::open(['route'=>'admin.category.store','method'=>'POST', 'file'=>true])!!}
@endif

<div class="container-fluid">
  <div class="container-fluid">
       <div class="row">
            <div class="form-group">
                  <div class="col-md-12"><h3 class="head">CATEGORÍA</h3>
                      <p>PAGINA PARA LA CATEGORÍA</p>
                  </div>
                <div class="col-md-3">
                  {!!Form::label('seccion','Seccion:')!!}
                  {!!Form::select('id_section', \App\cms_section::lists('title','id'),null,['class'=>'form-control select2'] )!!}
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
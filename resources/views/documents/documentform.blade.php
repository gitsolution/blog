@extends('layouts.app')
  @section('content')
       <!---contact-->

<?php  
if(isset($Document)) 
{
    $botonTitulo='Editar'; // para cambiar de nombre al submit si es editar o guardar
    $message='Edit';
    $id=$Document->id;
    $id_category=$Document->id_category;
    $title=$Document->title;
    $resumen=$Document->resumen;
    $content=$Document->content;
    $main_picture=$Document->main_picture;
  if($Document->private=="0")
      {
        $ChekPrivado = "";
      }
  else{
        $ChekPrivado = "checked"; 
      } 
    $publish_date = date_create($Document->publish_date);
  if($Document->publish=="0")
      {
        $ChekPublicar = "";  
      }
  else{
        $ChekPublicar = "checked"; 
      } 
    $uri=$Document->uri;
    $hits=$Document->hits;
    $order_by= $Document->order_by;
    $path=$Document->path;


}

else{ 
    $botonTitulo=' Crear';
    $message='New'; 
    $Document=Null;
    $title=$Document;
    $description=$Document;
    $ChekPrivado=$Document;
    $ChekPublicar = $Document;
    $publish_date= $Document;
    $order_by= $Document;
    $id_category=$Document;
    $id=$Document;
    $path=$Document;
  }
 ?>

@if($message=='Edit')
 {!!Form::model($Document,['route'=>['admin.document.update',$Document->id],'method'=>'PUT'])!!} 
@else
 {!!Form::open(['route'=>'admin.document.store','method'=>'POST'])!!}
@endif

<div class="container-fluid">
  <div class="container-fluid">
       <div class="row">
            <div class="form-group">
                  <div class="col-md-12"><h3 class="head">DOCUMENTO</h3>
                      <p>PAGINA PARA LA DOCUMENTO</p>
                  </div>
                <div class="col-md-3">
                  {!!Form::label('seccion','Sección:')!!}
                  {!!Form::select('id_section', $section ,null,['class'=>'form-control select2'], ['id'=>'id_section'] )!!}
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
          <div class="row">

              <div class="form-group">
            
              <div class="col-md-3">
                  {!!Form::label('seccion','Categoria:')!!}
                  {!!Form::select('id_category',['placehordel'=>'selecciona'], null, ['class'=>'form-control select2'], ['id'=>'id_category'])!!}
                <br>
                </div>
                </div>
          </div>
      <div class="row">
          <div class="col-md-12">
              {!!Form::label('date','Fecha De Publicación:')!!}  
          </div>
          
          <div class="col-md-3">
              {!!Form::date('publish_date', $publish_date,['class'=>'form-control'])!!}              
          </div>
      </div>
       
       <div class="row">

       <div class="form-group" >    
        <div class="col-md-12">
               <input type='file' name='file' id="imgLoad"  />
        </div>
      </div>
    </div>
       <div class="row">

       <div class="form-group" >    
        
          <div class="col-md-12">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <center>
              <div class="panel panel-primary" style="width:300px;">
                              <div class="panel-heading">                                  
                                  Imagen 
                              </div>
                              <div class="panel-body">
                                  <img id="imgUpTo" src="<?php echo $path ?>" alt="Imagen" class="img-responsive" />
                              </div>
                              <div class="panel-footer text-right">
                                @if($message=='Edit')
                                  {!!link_to('admin/deldocpic/'.$id, '',array('class'=>'img-responsive btn btn-danger glyphicon glyphicon-remove ')) !!}
                                @endif
                              </div>
                      </div>      
            </center>
        </div>                     
      
      </div>      
      </div>
  <div class="form-group">
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
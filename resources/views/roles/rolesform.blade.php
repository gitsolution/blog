@extends('layouts.app')
@section('content')

<?php

$chkActivado="null";

if(isset($roles)) {
    $message='Edit';
    $title=$roles->title;
    $description=$roles->description;
    $chk=$roles->active;
    $nameButtom="Editar";

    if($chk==1)
      {
        echo "";
        $chkActivado = "checked";
      }
      
      else
      {
        $chkActivado = ""; 
      } 
}

else
{  
    $message='New';
    $roles=Null;
    $title=$roles;
    $description=$roles;  
    $nameButtom="Registrar";  
}
?>

    <div class="col-md-12"><h3 class="head">Roles</h3>
                      <p>PÁGINA PARA LOS ROLES</p>
                  </div>
                
                <br><br><br>                          
            
               @if($message=='Edit')
                {!!Form::model($roles,['route'=>['admin.rol.update',$roles->id],'method'=>'PUT'])!!} 
                @else
                  {!!Form::open(['route'=>'admin.rol.store','method','POST'])!!}  
                @endif

                  {!!Form::open(['route'=>'admin.rol.store','method','POST'])!!}  
               
                    <div class="form-group" id="frmLogin">
                           <div class="col-xs-6">
                          {!!Form::label('titulo','Titulo')!!}
                          {!!Form::text('title',$title,['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                          </div>

                      <div class="col-xs-3">
                      <div class="priChec">
                          {!!Form::label('activado','Activado')!!}
                          <div class="material-switch pull-right">
                              <input id="someSwitchOptionSuccess" name="ChekActivacion" <?php echo $chkActivado ?>  type="checkbox"/>
                              <label for="someSwitchOptionSuccess" class="label-success"></label>
                          </div>           
                      </div>
                    </div>

                    <div class="col-xs-12">
                      {!!Form::label('descripcion','Descripcion')!!}
                      {!!Form::textarea('description',$description,['class'=>'form-control','placeholder'=>''])!!}
                    </div>       

                    <br>
                    <div class="col-xs-6">
                      <div class="col-xs-2">
                          {!!Form::submit($nameButtom,['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                      </div>
                      </div>    
                    </div>
                  
                {!!Form::close()!!}

@stop
@extends('layouts.app')
@section('content')

<?php
    $chkActivado=null;
    if(isset($user)) 
    {
        $idRoles= App\usr_role::lists('title','id');
        $usuario=DB::table('users')->select('name', 'id')->get();
        $message='Edit';
        $nombreCompleto = $user->name." ".$user->lastName;
        $idUsuario=$user->id;
    }

    $nombreModulo="usuarios";
?>


    <div class="col-md-6"><h3 class="head">Asignacio de roles</h3>
                      
                  </div>
                
                <br><br><br>               					   
               
                    {!!Form::open(['route'=>'admin.assignment.store','method','POST'])!!}  
                        <div class="col-md-6">
                            {!! Form::hidden('idUser', $user->id) !!}
                            {!! Form::label('id', 'Usuario') !!}
                            {!! Form::select('size', array($idUsuario => $nombreCompleto), null,['class'=>'form-control select2']) !!}
                          
                        </div>

                        <div class="col-md-6">
                            {!! Form::label('id', 'Selecciona el rol') !!}
                            {!! Form::select('id',$idRoles, null,['class'=>'form-control select2']) !!}
                        </div>

                        <br><br><br><br>
                         <div class="col-xs-1">
                      <div class="priChec">
                          {!!Form::label('activado','Activado')!!}
                          <div class="material-switch pull-right">
                              <input id="someSwitchOptionSuccess" name="ChekActivacion" <?php echo $chkActivado ?>  type="checkbox"/>
                              <label for="someSwitchOptionSuccess" class="label-success"></label>
                          </div>           
                      </div>
                    </div>

                        <br><br><br><br><br><br>
                        <div class="col-xs-6">
                            <div class="col-xs-2">
                                {!!Form::submit('Guardar',['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div>   

                    {!!Form::close()!!}

@stop
@extends('layouts.app')
@section('content')

<?php
    $chkActivado=null;
    
    if(isset($user) && isset($idUser)) 
    {
        $idRoles= App\usr_role::where('active',1)->lists('title','id');
        $usrProfile=DB::table('usr_profiles')->where('id',$user->id)->select('name', 'lastname')->first();    
        $userExist = DB::table('usr_login_roles')->where('id_login',$idUser)->select('id_login','id_role','active')->first();

        if($userExist==null or  $userExist->id_login<=0)
        {
          $button="Guardar";
          $message='Edit';
        }

        else
        {
          $button="Editar";
          $message='New';
          //$activ=$userExist->active;
        }

        $nombreCompleto =$usrProfile->name." ".$usrProfile->lastname;
        $idUsuario=$user->id;
    }

    else
    {
      
    }


    $nombreModulo="usuarios";
?>


    <div class="col-md-6"><h3 class="head">Asignacion de roles</h3>
                      
                  </div>
                
                <br><br><br>               					   
               @if($message=='Edit')
                {!!Form::model($userExist,['route'=>['admin.assignment.update',$idUsuario],'method'=>'PUT'])!!} 
                @else
                    {!!Form::open(['route'=>'admin.assignment.store','method','POST'])!!}
                @endif
                <div class="container-fluid">
                        <div class="col-md-6">
                            {!! Form::hidden('idUser', $idUsuario) !!}
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
                                {!!Form::submit($button,['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div>   
                    {!!Form::close()!!}
                    </div>

@stop
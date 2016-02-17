@extends('layouts.app')
@section('content')

<?php  
if(isset($user)) {
    $message='Edit';
    $id_login=$user->id;
    $name=$user->name;
    $lastName=$user->lastName;
    $email=$user->email;
    $created_at = date_create($user->created_at);
    $nombreBoton='Editar';
    
    $categories= App\usr_role::lists('title','id');
}

else
{  
    $message='New';
    $id_login=0;
    $user=Null;
    $name=$user;
    $lastName=$user;
    $email = $user;
    $nombreBoton='Registrar';
    $categories= App\usr_role::lists('title','id');
}

 ?>


    <div class="col-md-12"><h3 class="head">USUARIO</h3>
                      <p>PÁGINA PARA LOS USUARIOS</p>
                  </div>
                
                <br><br><br>               					   
               
               @if($message=='Edit')
                {!!Form::model($user,['route'=>['usuario.update',$user->id],'method'=>'PUT'])!!} 
                @else
                  {!!Form::open(['route'=>'usuario.store','method','POST'])!!} 
                @endif
                    {!!Form::text('id_login',$id_login,['class'=>'form-control frmEspacios','placeholder'=>''])!!}
					<div class="form-group" id="frmLogin">
					 <div class="col-xs-4">
            		{!!Form::label('nombre','Nombre')!!}
            		{!!Form::text('name',$name,['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
            		</div>

            		<div class="col-xs-4">
            		{!!Form::label('apellidos','Apellidos')!!}
            		{!!Form::text('lastName',$lastName,['class'=>'form-control frmEspacios','placeholder'=>'Apellidos'])!!}
            		</div>

            		<div class="col-xs-4">
            		{!!Form::label('Correo electrónico')!!}
            		{!!Form::email('email',$email,['class'=>'form-control frmEspacios','placeholder'=>'Correo electronico'])!!}
            		</div>

					<div class="col-xs-6">
						{!!Form::label('Contraseña')!!}
            			{!!Form::password('password',	['class'=>'form-control frmEspacios','placeholder'=>'Contraseña'])!!}
            		</div>

            		<div class="col-xs-6">
						{!!Form::label('Confirmar contraseña')!!}
            			{!!Form::password('password',['class'=>'form-control frmEspacios','placeholder'=>'Confirmar contraseña'])!!}
            		</div>

                    <div class="col-xs-12">
                        {!! Form::label('id', 'Selecciona el rol') !!}
                        {!! Form::select('id',$categories, ['class'=>'form-control']) !!}
                    </div>



      				<div class="col-xs-6">
                    	<div class="col-xs-2">
            				{!!Form::submit($nombreBoton,['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                        </div>
            		</div>		
					</div>
            	{!!Form::close()!!}

@stop
@extends('layouts.menuAdmin')
@section('content')

 <div class="registro">

            <p class="tituloRegistro col-md-12 frmEspacios titulo"><label>Registrar nuevo</label></p>

					{!!Form::open(['route'=>'usuario.store','method'=>'POST'])!!}
					<div class="form-group" id="frmLogin">
					 <div class="col-xs-4">
            		{!!Form::label('nombre','Nombre')!!}
            		{!!Form::text('name',null,['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
            		</div>

            		<div class="col-xs-4">
            		{!!Form::label('apellidos','Apellidos')!!}
            		{!!Form::text('apellidos',null,['class'=>'form-control frmEspacios','placeholder'=>'Apellidos'])!!}
            		</div>

            		<div class="col-xs-4">
            		{!!Form::label('Correo electrónico')!!}
            		{!!Form::email('email',null,['class'=>'form-control frmEspacios','placeholder'=>'Correo electronico'])!!}
            		</div>

					<div class="col-xs-6">
						{!!Form::label('Contraseña')!!}
            			{!!Form::password('password',	['class'=>'form-control frmEspacios','placeholder'=>'Contraseña'])!!}
            		</div>

            		<div class="col-xs-6">
						{!!Form::label('Confirmar contraseña')!!}
            			{!!Form::password('cPasswd',['class'=>'form-control frmEspacios','placeholder'=>'Confirmar contraseña'])!!}
            		</div>

            		<div class="col-xs-3">
            		   {!!Form::label('Genero')!!}
                       {!!Form::select('size', array('m' => 'Masculino', 'f' => 'Femenino'))!!}
                  </div>

                 	<div class="col-xs-5 form-group">
                        {!!Form::label('Fecha')!!}
                        
                    </div>

            		<div class="col-xs-7 form-group">
	                    {!!Form::label('Seleccionar archivo')!!}
	                    {!!Form::file('image')!!}
                 	</div>              

      				<div class="col-xs-6">
                    	<div class="col-xs-2">
            				{!!Form::submit('Registrar',['class'=>'btn btn-primary frmEspacios','placeholder'=>'Nombre'])!!}
            			</div>
            			<div class="col-xs-2">
            				{!!Form::submit('Cancelar',['class'=>'btn btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
            			</div>
            		</div>		
					</div>
            	{!!Form::close()!!}

        </div>
    </div>

@stop
@extends('layouts.menuAdmin')
@section('content')

 <div class="registro">

            <p class="tituloRegistro col-md-12 frmEspacios titulo"><label>Registrar nuevo usuario</label></p>


                <form id="frmLogin" >

					{!!Form::open()!!}
					<div class="form-control"></div>
            		{!!Form::label('nombre','Nombre')!!}
            		{!!Form::text('nombre',null,['class'=>'form-control frmEspacios','placerholder'=>'Nombre'])!!}

            		{!!Form::label('Nombre')!!}
            		{!!Form::text('nombre',null,['class'=>'form-control frmEspacios','placerholder'=>'Nombre'])!!}
            	

				</div>
            	{!!Form:close()!!}




                  <div class="col-xs-4">
                    <label >Nombre</label>
                    <input type="text" class="form-control frmEspacios" id="nombre" placeholder="Nombre" required>
                  </div>

                  <div class="col-xs-4">
                    <label >Apellidos</label>
                    <input type="text" class="form-control frmEspacios" id="Apellidos" placeholder="Apellidos" required>
                  </div>

                   <div class="col-xs-4">
                    <label >Correo electrónico</label>
                    <input type="email" class="form-control frmEspacios" id="email" placeholder="Correo electrónico">
                  </div>
                        
                  <div class="col-xs-6">
                    <label >Contraseña</label>
                    <input type="password" class="form-control frmEspacios" id="passwd" placeholder="Contraseña">
                  </div>
                  <div class="col-xs-6">
                    <label >confirmar contraseña</label>
                    <input type="password" class="form-control frmEspacios" id="passwd" placeholder="Confirmar contraseña">
                  </div>

                  <div class="col-xs-3">
                        <label >Genero</label>
                            <select class="form-control frmEspacios">
                                  <option>Masculino</option>
                                  <option>Femenino</option>
                            </select>
                      </div>

                      <div class="col-xs-3">
                        <label >Fecha</label>
                        <input type="date" class="form-control frmEspacios" id="email" placeholder="Fecha" required>
                      </div>

                 <div class="col-xs-7">
                    <label for="">Seleccinar archivo</label>
                    <input type="file" id="exampleInputFile" class="frmEspacios">
                 </div>


                  
                  <div class="col-xs-6">
                    <div class="col-xs-2">
                    <button type="button" class="btn btn-primary frmEspacios">Registrar</button>
                     </div>
                  <div class="col-xs-2">
                     <button type="button" class="btn btn-danger frmEspacios">Cancelar</button>
                  </div>
                </form>
        </div>
    </div>

@stop
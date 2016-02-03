@extends('layouts.menuAdmin')

@section('content')
    
   <div class="registro">

            <p class="tituloRegistro col-md-12 frmEspacios"><label>Registrar nuevo usuario</label></p>

                <form id="frmLogin" >

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
                        
                  <div class="col-xs-3">
                    <label >Contraseña</label>
                    <input type="password" class="form-control frmEspacios" id="passwd" placeholder="Contraseña">
                  </div>
                  <div class="col-xs-3">
                    <label >confirmar contraseña</label>
                    <input type="password" class="form-control frmEspacios" id="passwd" placeholder="Confirmar contraseña">
                  </div>

                 <div class="col-xs-6">
                    <label for="">Seleccinar archivo</label>
                    <input type="file" id="exampleInputFile" class="frmEspacios">
                 </div>
                  
                  <div class="col-xs-12">
                    <div class="col-xs-2">
                     <button type="submit" class="btn btn-default form-control btn-flat frmEspacios btnRegistrar">Registrar</button>
                     </div>
                  <div class="col-xs-2">
                     <button type="submit" class="btn btn-default form-control btn-flat frmEspacios btnCancelar">Cancelar</button>
                  </div>
                </form>
        </div>

@stop
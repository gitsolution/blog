@extends('layouts.app')
@section('content')

    <div class="col-md-12"><h3 class="head">Roles</h3>
                      <p>PÁGINA PARA LOS ROLES</p>
                  </div>
                
                <br><br><br>                                   
            
                  {!!Form::open(['route'=>'usuario.store','method','POST'])!!} 
               
                    <div class="form-group" id="frmLogin">
                           <div class="col-xs-6">
                          {!!Form::label('titulo','Titulo')!!}
                          {!!Form::text('title',null,['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                          </div>

                       <div class="col-xs-3">
                          <div class="priChec">
                            {!!Form::label('active','Activado')!!}
                            <div class="material-switch pull-right">
                              <input id="someSwitchOptionSuccess" name="ChekPrivado" type="checkbox"/>
                              <label for="someSwitchOptionSuccess" class="label-success"></label>
                            </div>           
                          </div>
                      </div>

                    <div class="col-xs-12">
                      {!!Form::label('description','Descripcion')!!}
                      {!!Form::textarea('resumen',null,['class'=>'form-control','placeholder'=>''])!!}
                    </div>       

                    <br>
                    <div class="col-xs-6">
                      <div class="col-xs-2">
                          {!!Form::submit('Registrar',['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                      </div>
                      </div>    
                    </div>
                  
                {!!Form::close()!!}

@stop
@extends('layouts.menuAdmin')
  @section('content')
       <!---contact-->

<div class="main-contact">
  <h3 class="head">SECCION</h3>
  <p>PAGINA PARA LA SECCION</p>
  <div class="contact-form">
        {!!Form::open(['route'=>'sections.store', 'method'=>'POST'])!!}
          <div class="row">
              <div class="form-group">
                <div class="col-md-3">
                  {!!Form::label('tipo','Tipo:')!!}
                  {!!Form::select('size', array('L' => 'Large', 'S' => 'Small'))!!}
                </div>
                <div class="col-md-5">
                  <div class="publiChec">
                      {!!Form::label('privado','Publicar')!!}
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionInfo" name="ChekPrivado" value="1" type="checkbox"/>
                            <label for="someSwitchOptionInfo" class="label-info"></label>
                        </div>     
                  </div>
                </div>
                       <!---CheckBox-->
                <div class="col-md-3">
                  <div class="priChec">
                      {!!Form::label('privado','Privado')!!}
                      <div class="material-switch pull-right">
                          <input id="someSwitchOptionSuccess" name="ChekPublico" value="1" type="checkbox"/>
                          <label for="someSwitchOptionSuccess" class="label-success"></label>
                      </div>           
                  </div>
                </div>
              </div>
          </div>
          <div class="form-group">
            {!!Form::label('titulo','Titulo:')!!}
            {!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>''])!!}
          </div>
          <div class="form-group">
            {!!Form::label('resumen','Resumen')!!}
            {!!Form::textarea('resumen',null,['class'=>'form-control','placeholder'=>''])!!}
          </div>
          <div class="form-group">
            {!!Form::label('contenido','Contenido')!!}
            {!!Form::textarea('contenido',null,['class'=>'form-control','placeholder'=>''])!!}
          </div>
         <div class="form-group">
                     {!!Form::label('Imagen Principal')!!}
                     {!!Form::file('image')!!}
                  </div>
          {!!Form::submit()!!}
        {!!Form::close()!!} 
  </div>
</div>
  @stop
<!--fin del archivop-->
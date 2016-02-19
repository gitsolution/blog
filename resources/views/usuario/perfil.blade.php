@extends('layouts.app')
@section('content')

<?php 

$publish=null;

?>

	{!!Form::open(['route'=>'admin.perfil.store','method','POST','novalidate' => 'novalidate','files' => true])!!} 
 
			 <div class="row">
			    
			<br><br>
			 <div class="form-group" >
			 	<div class="col-md-4">
			 	  {!!Form::label('Nombre:')!!}
			 	  {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Ingresa el Nombre de la imagen'])!!}
			 	 </div>
			 	 <div class="col-md-7">
			 	  {!!Form::label('Apellidos:')!!}
			 	  {!!Form::text('lastname',null,['class'=>'form-control', 'placeholder'=>'Ingresa el Nombre de la imagen'])!!}
			 	 </div>
			 </div> 

			<br><br><br><br><br>
			  <div class="col-md-3">
			  			{!!Form::label('Imagen de perfi:')!!}
			   		   <input type='file' name='file' id="imgLoad" />
			  </div>       

			</div>

 				<div class="row">
				 <div class="form-group" >
				 		<div class="col-md-12">
				 		<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="panel panel-primary">
				                        <div class="panel-heading">
				                            Imagen
				                        </div>
				                        <div class="panel-body">
				                            <img id="imgUpTo" src="#" alt="Imagen" />
				                        </div>
				                        <div class="panel-footer">
				                        </div>
				                </div>      
				        </div>                     
				 </div>
				</div>

				<div class="form-group" >
 					 <div class="col-xs-6">
                        {!! Form::label('id', 'Selecciona el rol') !!}
                        {!! Form::select('id',array('masculino' => 'Masculino', 'femenino' => 'Femenino'), null,['class'=>'form-control select2']) !!}
                    </div>

                    <div class="col-md-3">
				 	  {!!Form::label('Fecha Publicación:')!!}
				 	  {!!Form::date('born_date','born_date',['class'=>'form-control', 'placeholder'=>'Ingresa la Fecha de Publicación del Albúm'])!!}
					</div>
				</div>
				

				<div clas="row"><br><br><br>
				<div class="form-group" >
					<div class="col-md-12">
					 {!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
					</div>
				</div>
				</div>
 {!!Form::close()!!}
 </div>



@stop
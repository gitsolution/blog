@extends('frontend.index')
@section('content')

	<hr>
	<hr>
	{!!Form::open(['route'=>'inicio.store','method','POST', 'class'=>'form-group col-xs-4'] )!!}
	     <div class="form-group col-xs-12">
	     <div class="col-xs-12">
	         <label for="inputName" class="control-label">Nombres*</label>
	             <input type="name" name ="name" class="form-control" placeholder="Nombre" required="">
	         </div>
	     </div>
	     <div class="form-group col-xs-12">
	     <div class="col-xs-12">
	         <label for="inputEmail" class="control-label">Email</label>
	             <input type="email" name ="email" class="form-control" placeholder="Email">
	         </div>
	     </div>

	     <div class="form-group col-xs-12">
	     <div class="col-xs-12">
	         <label for="inputEmail" class="control-label">Telefono*</label>
	             <input type="phone" name ="phone" class="form-control" placeholder="telefono" required="">
	         </div>
	     </div>

		  <div class="form-group col-xs-12">
		  <div class="col-xs-12">
		    <label class="control-label" for="exampleInputAmount " >Monto aproximando a solicitar</label>
		    <div class="input-group">
		      <div class="input-group-addon">$</div>
		      <input type="text" class="form-control" id="exampleInputAmount" name="montoaproximado" placeholder="Monto">	
		    </div>
		    </div>
		  </div>

		  <div class="form-group col-xs-12">
		  <div class="col-xs-12">
		    <label class="control-label" for="exampleInputAmount " >Ventas mensuales aproximadas<br></label>
		    <div class="input-group">
		      <div class="input-group-addon">$</div>
		      <input type="text" class="form-control" id="exampleInputAmount" name="ventasmensuales" placeholder="Ventas mensuales aproximada">	
		    </div>
		    </div>
		  </div>

		  	<div class="form-group col-xs-12">
		     	<div class="col-xs-12">
		         <label for="inputName" class="control-label">Oficio o Profesión</label>
		             <input type="oficioprofesion" class="form-control" name="oficioprofesion" placeholder="Nombre" required="">
		         </div>
	     	</div>

	     	<div class="form-group col-xs-12">
		     	<div class="col-xs-12">
		         <label for="inputName" class="control-label">Destino del Crédito</label>
		             <input type="destinocredito" class="form-control" name="destinocredito" placeholder="Destino del credito" required="">
		         </div>
	     	</div>
	     
	     <div class="form-group col-xs-12">
	     <div class="col-xs-12">
	         <label for="inputPassword" class="control-label">Información Adicional</label>
	             <textarea class="form-control" name ="asunt" class="form-control" placeholder="Asunto" rows="6" required=""></textarea>
	         </div>
	     </div>
	     <div class="form-group">
	         <div class="col-xs-10"> <br>
	             <button type="submit" name="solicitar" class="btn btn-primary">Solicitar</button>
	         </div>
	     </div>
	{!!Form::close()!!}

@stop
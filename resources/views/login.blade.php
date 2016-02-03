<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
	<title></title>
</head>
<body>

		<div class="col-md-6 col-md-offset-4 registro">

			<p class="tituloRegistro col-md-12 col-md-offset-2"><label>Registrar nuevo usuario</label></p>

				<form id="frmLogin" >			


 				  <div class="col-xs-4">
				    <label >Name</label>
				    <input type="text" class="form-control" id="name" placeholder="Name">
				  </div>

				  <div class="col-xs-8">
				    <label >Last Name</label>
				    <input type="text" class="form-control" id="email" placeholder="Last Name">
				  </div>
				   

				   <div class="col-xs-12">
				    <label >Email address</label>
				    <input type="email" class="form-control" id="email" placeholder="Email">
				  </div>
				  
				  <div class="col-xs-4">
				    <label >Gender</label>
					    <select class="form-control">
							  <option>genero1</option>
							  <option>genero1</option>
						</select>
				    <input type="text" class="form-control" id="passwd" placeholder="Password">
				  </div>


				  <div class="form-group">
				    <label >Password</label>
				    <input type="password" class="form-control" id="passwd" placeholder="Password">
				  </div>

				  <div class="form-group">
				    <label >picture</label>
				    <input type="file" class="form-control" id="email" placeholder="picture">
				  </div>

				  <div class="form-group">
				    <label >Gender</label>
				    <input type="text" class="form-control" id="passwd" placeholder="Password">
				  </div>

				  
				  <button type="submit" class="btn btn-default form-control btn-flat btnRegistrar">Registrar</button>
				</form>
		</div>



</body>
</html>
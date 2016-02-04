<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Soluciones y Oportunidades</title>
	<meta  name = "viewport"  content = "width = dispositivo de ancho, escala inicial = 1, de máxima escala = 1, el usuario escalable = no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>

   <div  class = "container colorFondo " >
 
 <!--  cabecera inicio   -->
       <div class= "row colorHeader" >
       			
       			<div class= "col-md-2 " ><img src="imagenes/logo.png" class="img-responsive" ></div>
       			<div class= "col-md-3 titulo" >Soluciones y &nbsp;<span class="TituloSpam">Oportunidades</span> </div>
       			<div class= "col-md-5 titulo2">Soluciones y Oportinudades SA de CV SOFOM ENR</div>
 	   </div>
<!--  Cabecera fin    -->

    <div class="separador"></div>

<!--####### Menu ##### -->
    <div class= "row colormenu"  >
        
        <div class="col-md-8 colormenu">
        <div class="navbar-header">
        	 <a class="navbar-brand" href="index.php">Empresa</a>
        </div>
        	
          	<ul  class="nav navbar-nav">
            	<li  class="active "><a href="#">Productos Financieros</a></li>
            	<li><a href="#">Informacion</a></li>
            	<li><a href="#">Aviso de privacidad</a></li>
            	<li><a href="contacto.php">Contacto</a></li>
            	<li class=""><a href="Galeria.html">Galeria</a></li>

            </ul>
        </div>
    </div>

<!--  Fin menu  -->


 @yield('content')



       <div class="separadorFooter"></div>



<!--#### pie de pagina ####--> 
    <div class= "row footer" >
       
       <div class="row">
         <div class="col-md-6">
            <div class="Datos">
                  <div > Tel:(961) 618-1553 / (961) 618-1554 </div>
                  <div>Calle 12 Poniente Norte 931-C</div>
                  <div>Barrio Juy Juy</div>
                  <div>CP. 29038</div>
                  <div>Tuxtla Gutierrez, Chiapas, México.</div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="siguenos"> &nbsp;&nbsp; Siguenos:</div>
            <div class="col-md-2">
              <img src="imagenes/googleMas.png" width="30" height="30">
            </div>
             <div class="col-md-2">
             <img src="imagenes/iconofacebook.png" width="30" height="30">
             </div>
              <div class="col-md-2">
               <img src="imagenes/iconotwitter.png" width="30" height="30">
               </div>

            
          </div>
        </div>



   
          
    </div>
<!--  Fin pie de pagina   -->
          
        	
</div>

 <script>window.jQuery || document.write('<script src="js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
</body>
</html>
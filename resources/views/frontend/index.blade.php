<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Microfinanciera, microcreditos, creditos en chiapas, grupo solidario">
    <meta name="author" content="">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Valor Productivo SA de CV SOFOM ENR</title>

    <!-- Bootstrap Core CSS -->
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/admin.css')!!}
    <!-- Custom CSS -->
    {!!Html::style('css/business-frontpage.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            
  
            <div class="navbar-header">
             <div class="row">
             <div class="derecha col-md-7" style="width: 235px; height: 50px;">
                     <a href="Inicio"><img src="img/logo.png" class="img-responsive logo"></a>
                    </div>

              <div class="col-md-5">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>
                </div>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link" href="Inicio">Inicio</a>
                </li>
                 
                    <li class="dropdown">
                     <a class="nav-link" href="Empresa">Empresa</a>                        
                    </li>

                     <li>
                        <a class="nav-link" href="Servicios-Financieros">Servicios</a>
                    </li>
                     <li>
                        <a class="nav-link" href="Cobertura">Cobertura</a>
                    </li>
                     <li>
                        <a class="nav-link" href="Atencion-a-usuarios">Atención a usuarios</a>
                    </li>
                     <li>
                        <a class="nav-link" href="Informacion">Información</a>
                    </li>
                    <li>
                        <a class="nav-link" href="Contacto">Contacto</a>
                    </li> 
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
            @yield('content')

<hr>    
</div>

        <footer class="panel-footer">
            <div class="container">
                <div class="row">
                <div class="col-md-3"></div>
               <div class="col-md-9">
                <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link" href="Inicio">Inicio</a>
                </li>
                 
                    <li class="dropdown">
                     <a class="nav-link" href="Empresa">Empresa</a>                        
                    </li>

                     <li>
                        <a class="nav-link" href="Servicios-Financieros">Servicios</a>
                    </li>
                      
                     <li>
                        <a class="nav-link" href="Atencion-a-usuarios">Atención a usuarios</a>
                    </li>
                     <li>
                        <a class="nav-link" href="Informacion">Información</a>
                    </li>
                    <li>
                        <a class="nav-link" href="Politica-de-Privacidad">Póliticas</a>
                    </li> 
                    
                </ul>
                </div>
                </div>
            <div class="row">
                <div class="col-md-4 " >
                <address> <strong>
                   Dirección: 6a Avenida Sur No.28-B, Col. Centro, Tapachula de Córdova y Ordóñez, Chiapas.
                   </strong>
                </address> 
                </div>
                <div class="col-md-2 text-center posFoo">
                 
                  <a href="http://www.cnbv.gob.mx/Paginas/default.aspx" target="_blank"> <img src="img/cnbv.png " class="img-responsive text-center poscondu" style="width: 200px;"></a>

                    </div>
                    <div class="col-md-2 text-center poscondu">
                   <a href="http://www.condusef.gob.mx/"  target="_blank"> <img src="img/condusef.png" class="text-center" style="width: 110px;"></a> 
                   </div>
                   <div class="col-md-2 text-center">           
                  <a href="http://www.buro.gob.mx/"  target="_blank">  <img src="img/buroent.png" class="img-responsive" style="width: 80px;"></a>
                  </div>

                </div>
            </div>
        </div>
        </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
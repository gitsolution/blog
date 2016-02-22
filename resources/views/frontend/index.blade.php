<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT Solution</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    {!!Html::style('css/admin.css')!!}
    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">

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
            <div class="derecha" style="width: 295px; height: 98px;">
                     <a href="#"><img src="img/logo.png" class="img-responsive"></a>
                    </div>
              
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                            <li>
                    <a href="inicio">Home</a>
                </li>
                    <li>
                        <a href="historia">Historia</a>
                    </li>
                    <li>
                        <a href="#">Misión</a>
                    </li>
                    <li>
                        <a href="#">Visión</a>
                    </li>
                     <li>
                        <a href="#">Valores</a>
                    </li>
                     <li>
                        <a href="#">Servicios</a>
                    </li>
                     <li>
                        <a href="#">Covertura</a>
                    </li>
                     <li>
                        <a href="#">Atención a usuarios</a>
                    </li>
                     <li>
                        <a href="#">Información</a>
                    </li> 
                    
                </ul>
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

            @yield('content')

    
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

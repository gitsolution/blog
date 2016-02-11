<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    
    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    {!!Html::style('css/admin.css')!!}
    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    {!!Html::style('../bower_components/bootstrap/dist/css/bootstrap.min.css')!!}
    {!!Html::style('../bower_components/metisMenu/dist/metisMenu.min.css')!!}
    {!!Html::style('../dist/css/timeline.css')!!}
    {!!Html::style('../dist/css/sb-admin-2.css')!!}
    {!!Html::style('../bower_components/morrisjs/morris.css')!!}
    {!!Html::style('../bower_components/font-awesome/css/font-awesome.min.css')!!}

</head>

<body>
<br><br><br><br><br><br>







<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrarse</div>
                <div class="panel-body">

                {!!Form::open(['route'=>'usuario.store','method','POST'])!!} 
                <div class="form-group" id="frmLogin">
                     <div class="col-xs-4">
                    {!!Form::label('nombre','Nombre')!!}
                    {!!Form::text('name','',['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                    </div>

                    <div class="col-xs-4">
                    {!!Form::label('apellidos','Apellidos')!!}
                    {!!Form::text('lastName','',['class'=>'form-control frmEspacios','placeholder'=>'Apellidos'])!!}
                    </div>

                    <div class="col-xs-4">
                    {!!Form::label('Correo electrónico')!!}
                    {!!Form::email('email','',['class'=>'form-control frmEspacios','placeholder'=>'Correo electronico'])!!}
                    </div>

                    <div class="col-xs-6">
                        {!!Form::label('Contraseña')!!}
                        {!!Form::password('password',   ['class'=>'form-control frmEspacios','placeholder'=>'Contraseña'])!!}
                    </div>

                    <div class="col-xs-6">
                        {!!Form::label('Confirmar contraseña')!!}
                        {!!Form::password('password',['class'=>'form-control frmEspacios','placeholder'=>'Confirmar contraseña'])!!}
                    </div>


                    <div class="col-xs-6">
                        <div class="col-xs-2">
                            {!!Form::submit('Registrar',['class'=>'btn  btn-danger fa-user frmEspacios','placeholder'=>'Nombre'])!!}
                        </div>
                    </div>      
                    </div>
                {!!Form::close()!!}
                
                        
                </div>
            </div>
        </div>
    </div>
</div>





<!-- fin de contenido-->



    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>

    <!-- Custom Theme JavaScript -->

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
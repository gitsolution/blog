<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

 
    {!!Html::style('css/bootstrap.css')!!}
    {!!Html::style('css/admin.css')!!}
    {!!Html::script('js/ckeditor.js')!!}
    {!!Html::script('js/sample.js')!!}
    
    

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    {!!Html::style('../bower_components/bootstrap/dist/css/bootstrap.min.css')!!}
    {!!Html::style('../bower_components/metisMenu/dist/metisMenu.min.css')!!}
    {!!Html::style('../dist/css/timeline.css')!!}
    {!!Html::style('../dist/css/sb-admin-2.css')!!}
    {!!Html::style('../bower_components/morrisjs/morris.css')!!}
    {!!Html::style('../bower_components/font-awesome/css/font-awesome.min.css')!!}

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://itsolution.mx" target="_blank">IT Solution. Web Solution.</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
           
          <!-- /.dropdown -->
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                    @if (Auth::guest())
                       
                    @else
                        <li class="dropdown">
                            <a href="#" class=""  role="button" aria-expanded="false">
                                {{ Auth::user()->name }} 
                            </a>

                          
                        </li>
                    @endif
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>

                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                                   <li>
                                    <a href="#"><i class="fa fa-magic"></i> Menús <span class="fa arrow "></span></a>
                                   
                                    <!-- /.nav-third-level --><ul class="nav nav-second-level">
                                      <li>
                                              {!!link_to('admin/menus', '&nbsp;&nbsp;&nbsp; Menú',array('class'=>'fa fa-file-o')) !!}

                                        </li>
                                    </ul>
                                </li>
                            
                            
                                <li>
                                    <a href="#"><i class="fa fa-newspaper-o"></i> Publicaciones <span class="fa arrow "></span></a>
                                    <ul class="nav nav-second-level">
                                         <li>
                                              {!!link_to('admin/types', '&nbsp;&nbsp;&nbsp; Tipos',array('class'=>'fa fa-file-o')) !!}
                                        </li>
                                        <li>
                                              {!!link_to('admin/sections', ' Secciones',array('class'=>'glyphicon glyphicon-book')) !!}
                                        </li>
                                        <li>
                                             {!!link_to('admin/category', ' Categorias',array('class'=>'glyphicon glyphicon-object-align-horizontal')) !!}
                                        </li>
                                        <li>
                                             {!!link_to('admin/document', '&nbsp;&nbsp;&nbsp; Documentos',array('class'=>'fa fa-book')) !!}
                                        </li>
                                        <li>
                                            <a href="#" class="fa fa-comment-o">&nbsp;&nbsp;&nbsp; Comentarios</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->

                                </li>                                                     

 
                                <li>
                                    <a href="#" class="fa fa-camera"> Media <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            {!!link_to('admin/media', '&nbsp;&nbsp;&nbsp;Albums',array('class'=>'fa fa-picture-o ')) !!}
                                        </li>

                                                                        
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>                            
                            <!-- /.nav-second-level -->

                        <li>
                            <a href="s"><i class="fa fa-users fa-fw"></i>Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                {!!link_to('/usuario', '&nbsp;&nbsp;&nbsp;Usuarios',array('class'=>'fa fa-user ')) !!}
                                   
                                </li>
                                <li>
                                {!!link_to('admin/roles', '&nbsp;&nbsp;&nbsp;Roles',array('class'=>'fa fa-flag-o ')) !!}
                                    
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

 <div class="contenedor">
         
            @yield('content')

         
</div>
<!-- fin de contenido-->
   {!! Html::script('js/jquery-2.1.0.min.js') !!} 
    <!-- /#wrapper -->

    <!-- jQuery -->
    {!! Html::script('../bower_components/jquery/dist/jquery.min.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('../bower_components/bootstrap/dist/js/bootstrap.min.js') !!}    

    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('../bower_components/metisMenu/dist/metisMenu.min.js') !!}    
    


    <!-- Morris Charts JavaScript -->
    {!! Html::script('../bower_components/raphael/raphael-min.js') !!}    
    
    <!-- Custom Theme JavaScript -->

    <!-- Morris Charts JavaScript -->
    {!! Html::script('../bower_components/raphael/raphael-min.js') !!}    
    

    <!-- Custom Theme JavaScript -->
    {!! Html::script('../dist/js/sb-admin-2.js') !!}        
            
         <script>
        function imageUp(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgUpTo').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    $("#imgLoad").change(function(){
        imageUp(this);
    });
    </script>

<script>

 


var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


function getval(sel) {
    //   alert(sel.value);
    }

$(window).load(function(){
            $('#id_section').change(function(){
                var id=$(this).val();
                    $.ajax({
                        type:"GET",
                        url: "getSelect/"+id,
                        data: { id_section :  $(this).val() },
                        success: function(){
                        //do stuff after the AJAX calls successfully completes
                        alert(data);
                    }
                });
            });
    });

</script>
 <script>
  initSample();
</script>
</body>
<!--         function selectBox(e) {
        $.get('getCategories/' + $(this).val(), function(data) {
        $("#id_category").html(data);        
    }
}
 -->
</html>


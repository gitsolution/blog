@extends('layouts.app')
@section('content')

<?php

    $chkActivado=null;   
    $chkAcceso  =null;
    $chkPermitido=null;   
    $nombreBoton="Guardar";

    if(isset($idRole) && isset($idModulo))
    {
        $permisos=DB::table('usr_role_actions')->where('id_role', $idRole)->where('id_access', $idModulo)->get();
         $roles=DB::table('usr_roles')->where('id', $idRole)->first();
         $modulo = DB::table('cms_accesses')->where('id', $idModulo)->first();
         $chkActivado="";
         $nombreBoton="Guardar";
    }

    else 
    {
         //$roles=DB::table('usr_roles')->where('id', $idRole)->first();
         //$modulo = DB::table('cms_accesses')->where('id', $idModulo)->first();
         $chkActivado="";
         $nombreBoton="Guardar";
    }

?>
    <div class="col-md-12"><h3 class="head">Rol: Modulo:</h3>
    </div>
                
                <br><br><br>              					   
               
                  {!!Form::open(['route'=>'admin.configUpdate.store','method','POST'])!!}  
                     {!!Form::hidden('idRole',$idRole,['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                      {!!Form::hidden('idModulo',$idModulo,['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                    <div class="form-group" id="frmLogin">
                     <div class="col-xs-4">
                    {!!Form::label('nombre','Accion')!!}
                    {!!Form::text('action','',['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                    </div>

                     

                    <div class="col-md-3">
                  <div class="publiChec">
                      {!!Form::label('privado','Acceso')!!}
                          <div class="material-switch pull-right">
                            <input id="someSwitchOptionInfo" name="chkAcceso" <?php echo $chkAcceso ?> type="checkbox"/>
                            <label for="someSwitchOptionInfo" class="label-info"></label>
                        </div>     
                  </div>
                </div>


                       <!---CheckBox-->
                <div class="col-md-3">
                  <div class="priChec">
                      {!!Form::label('privado','Activado')!!}
                      <div class="material-switch pull-right">
                          <input id="someSwitchOptionSuccess" name="chkActivado" <?php echo $chkActivado ?>  type="checkbox"/>
                          <label for="someSwitchOptionSuccess" class="label-success"></label>
                      </div>           
                  </div>
                </div>

               <div class="col-xs-12">
                        <div class="col-xs-2">
                            {!!Form::submit($nombreBoton,['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                        </div>
                    </div>      

    </div>
                 {!!Form::close()!!}  

 
<table class="table table-hover">
          <thead class="center-text" >
            <th class="ColumColor text-left" >
            Rol
            </th> 
            <th  class="ColumColor text-left" >
            Modulo
            </th>
            <th  class="ColumColor text-left" >
            Acceso
            </th>
            <th class="ColumColor text-left" >
            Activar
            </th>
          </thead>
        @foreach($permisos as $permiso)
        <?php 
            //$created_at = substr($permiso->created_at,0,10);
        ?>
            <tbody>
                <td>{{$permiso->id_role}}</td>
                <td>{{$permiso->id_access}}</td>
                <td>{{$permiso->action}}</td>

                <td>
                <?php if($permiso->active=='1'){?>
                {!! link_to('admin/permissionUpdate/'.$permiso->id_role.'/'.$permiso->id_access.'/'.$permiso->action.'/True', '',array('class'=>'glyphicon glyphicon-ok')) !!}
              <?php } 
              else{ ?>
                
                {!! link_to('admin/permissionUpdate/'.$permiso->id_role.'/'.$permiso->id_access.'/'.$permiso->action.'/False', '',array('class'=>'glyphicon glyphicon-ban-circle')) !!}
              <?php } ?>

              </td>
                
            </tbody>
        @endForeach

    </table> 
               



@stop
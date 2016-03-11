@extends('layouts.app')
@section('content')

<?php

    $chkActivado=null;   
    $chkAcceso  =null;
    $chkPermitido=null;   
    $nombreBoton="Guardar";

    /*if(isset($idRole) && isset($idModulo))
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
    }*/

?>
    <div class="col-md-12"><h3 class="head"><?php echo "Rol: ".$nombreRol. "<br><br>modulo: ".$nombreModulo?></h3><br>
    </div>                 
                       <!---CheckBox-->
                {!!Form::open(['route'=>'admin.config.store','method','POST'])!!}                
                {!! Form::hidden('idRole', $idRole) !!}
                {!! Form::hidden('idModule', $idModulo) !!}
                        
                          




                          @foreach ($json as $item => $value)
                          <div class="col-md-3">
                            <?php if($value==1){$chk="true";}else{$chk="";} ?>
                            <?php echo $item; ?>
                            {{ Form::checkbox('role[]',$item,$chk)}} 
                          </div>
                          @endforeach

                       

                         <div class="col-md-6">
                            <div class="col-md-2"> <br> <br>
                                {!!Form::submit('Guardar',['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div> 
                       
                 {!!Form::close()!!}
@stop

<!--
                        <div class="row">
                          <div class="col-md-3">
                            Guardar                                   
                            {{ Form::checkbox('role[]','guardar')}} 
                          </div>
                          <div class="col-md-3">
                            Actualizar                                   
                            {{ Form::checkbox('role[]','actualizar')}} 
                          </div>
                        </div><br>

                        <div class="row">
                          <div class="col-md-3">
                            Eliminar                                   
                            {{ Form::checkbox('role[]','eliminar')}} 
                          </div>
                          <div class="col-md-3">
                            Agregar                                   
                            {{ Form::checkbox('role[]','eliminar')}} 
                          </div>
                        </div>-->
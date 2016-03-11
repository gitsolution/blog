@extends('layouts.app')
@section('content')

<?php

    $chkActivado=null;   
    $chkAcceso  =null;
    $chkPermitido=null;   
    $nombreBoton="Guardar";

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
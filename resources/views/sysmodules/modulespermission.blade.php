@extends('layouts.app')
@section('content')

    <div class="col-md-12"><h3 class="head"><?php echo "Permisos para el modulo: ".$nameModule;?></h3><br>
    </div>                 
                       <!---CheckBox-->
                {!!Form::open(['route'=>'admin.config.store','method','POST'])!!}                
                {!! Form::hidden('idModule', $id) !!}
                        
     

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
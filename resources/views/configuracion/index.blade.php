@extends('layouts.app')
@section('content')

<?php

$categories= App\usr_role::lists('title','id');

$banderaModulo=0;


if(isset($modulos)) {
    $banderaModulo=1;
}

else
{

}


 ?>


    <div class="col-md-12"><h3 class="head">Modulos</h3>
    </div>
                
                <br><br><br>              					   
               
                  {!!Form::open(['route'=>'admin.config.store','method','POST'])!!}  
                    <div class="col-xs-12">
                        {!! Form::label('id', 'Selecciona el rol') !!}
                        {!! Form::select('id',$categories, null,['class'=>'form-control select2']) !!}
                    </div>


                    <br><br><br><br>
                    @if($banderaModulo==1)
                        @foreach($modulos as $modulo)
                        <div class="row" >
                            <div class="col-md-4">
                                <div>  
                                 <button type="submit" class="btn btn-default btn-lg btn-block" name="boton" value="<?php echo $modulo->id ?>"><?php echo $modulo->title ?></button>
                                </div>
                            </div>
                        </div><br>
                                
                        @endForeach 
                    @else
                        <div class="col-md-12"><h3 class="head">No hay módulos disponibles</h3>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-info">Enviar</button>

                 {!!Form::close()!!}
                        
    </div>
                   
                     
               

@stop
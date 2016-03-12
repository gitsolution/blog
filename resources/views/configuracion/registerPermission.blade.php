@extends('layouts.app')
@section('content')

    <div class="col-md-12"><h3 class="head"><?php echo "Rol: ".$nombreRol. "<br><br>modulo: ".$nombreModulo?></h3><br>
    </div>                  
                <!---CheckBox-->
                {!!Form::open(['route'=>'admin.config.store','method','POST'])!!}                
                {!! Form::hidden('idRole', $idRole) !!}
                {!! Form::hidden('idModule', $idModulo) !!}

                <label onclick="chk()">Deseleccionar todo</label>
                  <div class="checkboxes">
                          @foreach ($json as $item)
                            <div class="col-md-3">
                              <!--{{ Form::checkbox('role[]',$item->title)}}-->
                              <?php echo $item->title; ?>                              
                              <input type="checkbox" name="role[]" value=""/>
                            </div>
                          @endforeach

                         <div class="col-md-6">
                            <div class="col-md-2"> <br> <br>
                                {!!Form::submit('Guardar',['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div> 
                      </div>
                       
                 {!!Form::close()!!}

<script>
   function chk()
   {
      var chks = document.getElementsByName('role[]');
      
      for(var i=0; i<chks.length; i++ )
      {
        alert(chks[i].value);
      }
   }
</script>
@stop
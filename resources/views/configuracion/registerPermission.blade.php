@extends('layouts.app')
@section('content')

    <div class="col-md-12"><h3 class="head"><?php echo "Rol: ".$nombreRol. "<br><br>modulo: ".$nombreModulo?></h3><br>
    </div>                  
                <!---CheckBox-->
                {!!Form::open(['route'=>'admin.config.store','method','POST'])!!}                
                {!! Form::hidden('idRole', $idRole) !!}
                {!! Form::hidden('idModule', $idModulo) !!}
 
                <!--<input type="checkbox" name="all" id="all" value="all" onclick="checkAll()"/>-->
                <div class="row">
                  <div class="col-md-3">
                    <label onclick="checkAll()" style="color: #008CBA">Seleccionar todo</label>
                  </div>
                  <div class="col-md-3">
                    <label onclick="uncheckAll()" style="color: #008CBA">Deseleccionar todo</label>
                  </div>
                  <div class="col-md-3">
                    <label onclick="check()" style="color: #008CBA">Ver</label>
                  </div>
                 </div>
                 <div class="row">
                <div class="permissionGroup">
                  <div class="col-md-8">

                  <div class="checkboxes">
                          @foreach ($json as $item)
                            <div class="col-md-4">
                              <!--{{ Form::checkbox('role[]',$item->title)}}-->
                              <?php echo $item->title; ?>                              
                              <input type="checkbox" name="role[]" value="<?php echo $item->title; ?>  " unchecked/>
                            </div>
                          @endforeach

                         <div class="col-md-6">
                            <div class="col-md-2"> <br> <br>
                                {!!Form::submit('Guardar',['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                            </div>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
                 {!!Form::close()!!}

<script>  
   function checkAll()
   {
      var boxes=document.getElementsByTagName('input');
    
      for(i=0;i<boxes.length-1;i++)
      {
        boxes[i].checked=true;
      }      
    }

    function uncheckAll()
   {
      var boxes=document.getElementsByTagName('input');
    
      for(i=0;i<boxes.length-1;i++)
      {
        boxes[i].checked=false;
      }      
    }

    function check()
    {
      var boxes=document.getElementsByTagName('input');
      
      var json="{";
      
      for(i=4;i<boxes.length-1;i++)
      {
        var value = boxes[i].value;
        var active=boxes[i].checked;
        json = json + value + ":" + active + ",";
      }

      json=json.slice(0,-1);

      json+="}";

    }


</script>
@stop
@extends('layouts.app')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@section('content')
    
    <div class="panel-heading">
        <br>
        <h2 class="panel-title">
         <i class="fa fa-cube fa-lg"><?php echo "Permisos para el Módulo: ".$nameModule?></i><br><br>
        </h2> 
    </div>          
           <!---CheckBox-->
                {!!Form::open(['route'=>'admin.cmsaccess.store','method','POST', 'id'=>'frmpermission'])!!}                
                {!! Form::hidden('idModule', $id) !!}
                {!! Form::hidden('nameModule', $nameModule) !!}
                                        

                  <div class="form-group" id="frmLogin">
                  <div class="row">
                        <div class="col-md-12">
                          {!!Form::label('nombre','Permiso:')!!}
                          {!!Form::text('name','',['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                        </div>

                        <div class="col-md-12">
                          {!!Form::label('descripcion','Descripcion')!!}
                          {!!Form::textarea('description','',['class'=>'form-control','placeholder'=>'Descripción del permiso'])!!}
                        </div>      

                         <div class="col-md-6">
                            <div class="col-md-2"><br>
                                {!!Form::submit('Guardar',['class'=>'btn  btn-primary frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div> 
                  </div>
                  </div>

                      @if(isset($permiso) && $permiso!=null)                         
                            <table class="table table-bordered table-hover">
                              <thead class="center-text" style="color: #1e91cf;" >
                                <th class="text-left" >
                                  Permisos
                                </th> 
                                <th  class="text-left" >
                                  Descripción del permiso
                                </th>
                                <th  class="text-left" >
                                  Eliminar
                                </th>           
                              </thead>
                          @foreach($permiso as $p)
                          @if($p->active==1)
                            <tbody>
                              <td>{{$p->title}}</td>
                              <td>{{$p->description}}</td>
                              <td> 
                                  <?php 
                                    if($p->active=='1'){
                                  ?>                  
                                      {!!link_to('admin/cmsaccessactive/'.$p->id_sysmodule.'/'.$p->id.'/False', '',array('class'=>'fa fa-check')) !!}
                                  
                                    
                                    <?php } 
                                    ?>
                              </td>                                    
                            </tbody>
                            @endif
                          @endForeach

                         </table>
                      @endif
                
{!!Form::close()!!}
@stop
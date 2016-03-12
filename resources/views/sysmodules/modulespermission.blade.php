@extends('layouts.app')
@section('content')

    <div class="col-md-12"><h3 class="head"><?php echo "Permisos para el modulo: ".$nameModule;?></h3><br>
    </div>                 
                       <!---CheckBox-->
                {!!Form::open(['route'=>'admin.cmsaccess.store','method','POST', 'id'=>'frmpermission'])!!}                
                {!! Form::hidden('idModule', $id) !!}
                {!! Form::hidden('nameModule', $nameModule) !!}
                                        

                  <div class="form-group" id="frmLogin">
                        <div class="col-md-12">
                          {!!Form::label('nombre','Permiso:')!!}
                          {!!Form::text('name','',['class'=>'form-control frmEspacios','placeholder'=>'Nombre'])!!}
                        </div>

                        <div class="col-md-12">
                          {!!Form::label('descripcion','Descripcion')!!}
                          {!!Form::textarea('description','',['class'=>'form-control','placeholder'=>'Descripción del permiso'])!!}
                        </div>      

                         <div class="col-md-6">
                            <div class="col-md-2"><br><br>
                                {!!Form::submit('Guardar',['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div> 
                  </div>

                      @if(isset($permiso) && $permiso!=null)
                        <div class="">
                            <table class="table table-hover">
                              <thead class="center-text" >
                                <th class="ColumColor text-left" >
                                  Permiso
                                </th> 
                                <th  class="ColumColor text-left" >
                                  Descripción del permiso
                                </th>
                                <th  class="ColumColor text-left" >
                                  Activar
                                </th>           
                              </thead>
                          @foreach($permiso as $p)
                            <tbody>
                              <td>{{$p->title}}</td>
                              <td>{{$p->description}}</td>
                              <td> 
                                  <?php 
                                    if($p->active=='1'){
                                  ?>                  
                                      {!!link_to('admin/cmsaccessactive/'.$p->id_sysmodule.'/'.$p->id.'/False', '',array('class'=>'fa fa-check')) !!}
                                   <?php 
                                        } 
                                       
                                       else{ 
                                    ?>                    
                                      {!!link_to('admin/cmsaccessactive/'.$p->id_sysmodule.'/'.$p->id.'/True', '',array('class'=>'fa fa-times')) !!}
                                    
                                    <?php } 
                                    ?>
                              </td>                                    
                            </tbody>
                          @endForeach

                         </table></div>
                      @endif
                
{!!Form::close()!!}
@stop
@extends('layouts.app')
@section('content')

<?php
    $chkActivado = "checked";
 
    if(isset($user) && isset($idUser)) 
    {

        if($userExist==null or  $userExist->id_login<=0)
        {
          $button="Guardar";
          $message='New';
        }

        else
        {
          $button="Editar";
          $message='Edit';
          //$chkActivado = "checked";
        }

        $nombreCompleto =$usrProfile->name." ".$usrProfile->lastname;
        $idUsuario=$user->id;
    }


    $nombreModulo="usuarios";
?>

    <div class="col-md-6"><h3 class="head">Asignacion de roles</h3>
    </div>
          <div class="form-group" id="frmLogin">      
                <br><br><br>       

               @if($message=='Edit')
                {!!Form::model($userExist,['route'=>['admin.assignment.update',$idUsuario],'method'=>'PUT'])!!} 
                @else
                    {!!Form::open(['route'=>'admin.assignment.store','method','POST'])!!}
                @endif
                        <div class="col-md-12">
                            {!! Form::hidden('idUser', $idUsuario) !!}
                            {!! Form::label('id', 'Usuario') !!}
                            {!! Form::select('size', array($idUsuario => $nombreCompleto), null,['class'=>'form-control select2']) !!}
                          
                        </div>
                        <br><br><br><br>
              
            @foreach($roles as $rol)
            <?php   
              $usrLoginRole=DB::table('usr_login_roles')->where('id_login',$idUsuario)->where('id_role',$rol->id)->select('active')->first();
              $act=DB::table('usr_roles')->where('id',$rol->id)->select('active')->first();
              if($usrLoginRole->active=="1")
              {
                $active="active";
                $chkActivado="checked";
              }

              else
              {
                $active=null;
                $chkActivado=null;
              }
              
            ?>
            @if($act->active=="1")
                          <div class="col-md-12">
                      <div class="btn-group" data-toggle="buttons"><label class="btn btn-primary <?php echo $active ?>">
                 <input type="checkbox" name="vRoles[]"  value="<?php echo $rol->id ?>" <?php echo $chkActivado ?>>
                <span class="glyphicon glyphicon-ok"></span>
               </label></div>
                      {!!Form::label('roles',$rol->title)!!}<br>
                  </div>
              @else
                <?php
                  $userRols= DB::table('usr_login_roles')->where('id_login', '=', $idUser)->where('id_role','=',$rol->id)->update(['active' => 0]);
                  ?> 
              @endif
            @endforeach

                     
                   

                        <br>
                        <div class="col-xs-6">
                            <div class="col-xs-2">
                                {!!Form::submit($button,['class'=>'btn  btn-danger frmEspacios','placeholder'=>'Nombre'])!!}
                             </div>
                        </div>  </div>  

                    {!!Form::close()!!}
@stop
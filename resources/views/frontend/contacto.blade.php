@extends('frontend.index')
@section('content')

<hr>
<hr>
{!!Form::open(['route'=>'inicio.store','method','POST'])!!}
     <div class="form-group"><br>
     <div class="col-xs-12">
         <label for="inputName" class="control-label">Nombres*</label>
             <input type="name" name ="name" class="form-control" placeholder="Nombre" required="">
         </div>
     </div>
     <div class="form-group"><br>
     <div class="col-xs-12"><br>
         <label for="inputEmail" class="control-label">Email</label>
             <input type="email" name ="email" class="form-control" placeholder="Email">
         </div>
     </div>
     <div class="form-group"><br>
     <div class="col-xs-12"><br>
         <label for="inputEmail" class="control-label">Telefono*</label>
             <input type="phone" name ="phone" class="form-control" placeholder="telefono" required="">
         </div>
     </div>
     <div class="form-group"><br>
     <div class="col-xs-12"><br>
         <label for="inputPassword" class="control-label">Asunto*</label>
             <textarea class="form-control" name ="asunt" class="form-control" placeholder="Asunto" rows="6" required=""></textarea>
         </div>
     </div>
     <div class="form-group">
         <div class="col-xs-10"><br>
             <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
         </div>
     </div>
{!!Form::close()!!}
@stop
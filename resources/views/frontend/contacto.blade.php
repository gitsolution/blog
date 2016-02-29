@extends('frontend.index')

@section('content')

<hr>
<hr>
{!!Form::open(['route'=>'inicio.store','method','POST'])!!}

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

     <div class="form-group"><br>
     <div class="col-xs-12">
         <label for="inputName" class="control-label">Nombres*</label>
             <input name ="name" class="form-control" placeholder="Nombre">
         </div>
     </div>
     <div class="form-group"><br>
     <div class="col-xs-12"><br>
         <label for="inputEmail" class="control-label">Email</label>
             <input name ="email" class="form-control" placeholder="Email">
         </div>
     </div>
     <div class="form-group"><br>
     <div class="col-xs-12"><br>
         <label for="inputEmail" class="control-label">Telefono*</label>
             <input type="phone" name ="phone" class="form-control" placeholder="telefono">
         </div>
     </div>
     <div class="form-group"><br>
     <div class="col-xs-12"><br>
         <label for="inputPassword" class="control-label">Comentario*</label>
             <textarea class="form-control" name ="asunt" class="form-control" placeholder="Comentario" rows="6" ></textarea>
         </div>
     </div>
     
      <div class="form-group">
         <div class="col-xs-10"><br>
            {!! Recaptcha::render() !!}
         </div>
     </div>

     <div class="form-group">
         <div class="col-xs-10"><br>
             <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
         </div>
     </div>

{!!Form::close()!!}
@stop
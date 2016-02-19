<h1>Bienvenid@ {{$data['name']}}</h1>

{{url('/auth/confirm/email/<?php echo $data['email']?>/confirm_token/<?php echo $data['confirm_token']?>')}}

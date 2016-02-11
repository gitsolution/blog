@extends('layouts.app')
@section('content')


<div class="row">
<br>
<div class="col-md-10"><h3>Catálago de roles</h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/roleNew', 'Nuevo roles ',array('class'=>'btn btn-success ')) !!}
 {!!Form::close()!!}
</div>
    </div>

<table class="table table-hover table-responsive">
          <thead class="center-text" >
            <th class="ColumColor text-left" >
            ID
            </th> 
            <th  class="ColumColor text-left" >
            Titulo
            </th>
            <th  class="ColumColor text-left" >
            Descripcion
            </th>
           
          </thead>

		@foreach($roles as $rol)
			<tbody>
				<td>{{$rol->id}}</td>
				<td>{{$rol->name}}</td>
				<td>{{$rol->lastName}}</td>
				<td>{{$rol->email}}</td>
				<td>{{$created_at}}</td>
				<td>
				{!! link_to('admin/userEdit/'.$rol->id, '',array('class'=>'btn btn-primary glyphicon glyphicon-pencil')) !!}
				</td>

			</tbody>
		@endForeach

	</table>




	
@stop
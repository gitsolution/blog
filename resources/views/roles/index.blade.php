@extends('layouts.app')
@section('content')


<div class="row">
<br>
<div class="col-md-10"><h3>Catálago de roles</h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/rolesNew', 'Nuevo roles ',array('class'=>'btn btn-success ')) !!}
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
            <th  class="ColumColor text-left" >
             Activo
            </th>
            <th  class="ColumColor text-left" >
             Creado el
            </th>
            <th  class="ColumColor text-left" >
             Acciones
            </th>
           
          </thead>

	

	@foreach($roles as $rol)
			<tbody>
				<td>{{$rol->id}}</td>
				<td>{{$rol->title}}</td>
				<td>{{$rol->description}}</td>
				 	@if($rol->active==1)
					<td><i class="fa fa-check"></i></td>
					@else
					<td><i class="fa fa-times">	</i></td>
					@endif
				<td>{{$rol->created_at}}</td>
				<td>
				{!! link_to('admin/rolesEdit/'.$rol->id, '',array('class'=>'btn btn-primary glyphicon glyphicon-pencil')) !!}
        {!! link_to('admin/rolesDelete/'.$rol->id, '',array('class'=>'btn btn-danger glyphicon glyphicon-trash')) !!} 
				</td>

			</tbody>
		@endForeach




	

	</table>

	
@stop
@extends('layouts.app')
@section('content')


<div class="row">
<br>
<div class="col-md-10"><h3>Catálago de cms</h3></div> <!--divide la columna en 10 y 2-->
<div class="col-md-2">
 {!!Form::open()!!}
    {!! link_to('admin/cmsNew', 'Nuevo cms ',array('class'=>'btn btn-success ')) !!}
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
             Acciones
            </th>
           
          </thead>

	

	@foreach($cms as $cm)
			<tbody>
				<td>{{$cm->id}}</td>
				<td>{{$cm->title}}</td>
				<td>{{$cm->description}}</td>
				 	@if($cm->active==1)
					<td><i class="fa fa-check"></i></td>
					@else
					<td><i class="fa fa-times">	</i></td>
					@endif
				<td>
				{!! link_to('admin/cmsEdit/'.$cm->id, '',array('class'=>'btn btn-primary glyphicon glyphicon-pencil')) !!}
				</td>

			</tbody>
		@endForeach




	

	</table>

	
@stop
@extends('layouts.app')
@section('content')

<div class="container-fluid">
<div class="row">
	<br>
	<div class="col-md-8">
	<h3>Seleccione un Tipo de Menú a crear </h3>
	</div> <!--divide la columna en 10 y 2-->
	<div class="col-md-2 text-right">	
 	 {!! link_to('admin/itemmenu/'.$id_menu, 'Regresar',array('class'=>'btn btn-info')) !!}
	</div>	 

</div>
	
		<div class="row" >

			<div class="col-md-4">
				<div>
					<a href="<?php echo '../'.$id_menu.'/'.$id_parent.'/LinkTo'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a un Link Externo</a>
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/Section'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Sección</a>
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/CategoryList'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Lista de Categorías</a>
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/Category'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Categoría</a>
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/DocumentList'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Lista de Documentos</a>
				</div>
			</div>
		</div>

		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/Document'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Documento</a>
				</div>
			</div>
		</div>	
		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/GalleryList'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Lista de Galerías</a>
				</div>
			</div>
		</div>
		<div class="row" >
			<div class="col-md-4">
				<div>
					<a href="<?php echo $id_menu.'/Gallery'; ?>" class="btn btn-default btn-lg btn-block" >Vínculo a una Galería</a>
				</div>
			</div>
		</div>


</div>
@stop
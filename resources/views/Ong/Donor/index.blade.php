@extends('layouts.principal')
<?php $message=Session::get('message')?>

@if($message == 'store')
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Creado. </strong> Donador creado exitosamente.
</div>
@endif
@if($message == 'edit')
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Editado. </strong> Donador editado exitosamente.
</div>
@endif
@if($message == 'erase')
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Inhabilitado.</strong> Donador inhabilitado exitosamente.
</div>
@endif

@section('content')
	<div class="container col-xs-12">
	<h3 class="title" selected="selected">Donadores</h3>
	<a href="/donantes/create" class="btn btn-danger">Crear Donador</a> 
	{!!Form::open(['rout'=>'Donadores.index','method'=>'GET','class'=>'navbar-form navbar-left pull-right','role'=>'search'])!!}
		<div class="form-group">
			{!!Form::select('active',['activos'=>'Activos','inhabilitados'=>'Inhabilitados','todos'=>'Todos'],null,['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::select('type',['nombre'=>'Nombre','e_mail'=>'Correo'],null,['class'=>'form-control'])!!}
		</div>
		<div class="form-group">
			{!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar...'])!!}            
		</div>
		<button type="submit" class="btn btn-default glyphicon glyphicon-search"> </button>
	{!!Form::close()!!}
	<div></div>
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Operación</th>
			</thead>
			@foreach($donor as $Donador)
			<tbody>
				<td>{{$Donador->donor_name}}</td>
				<td>{{$Donador->donor_lastname}}</td>
				<td>{{$Donador->e_mail}}</td>
				<td>{!!link_to_route('donantes.edit', $title = 'Editar', $parameters = $Donador->id, $attributes = ['class'=>'btn btn-primary']);!!}
				<a href="/donaciones/create/{{$Donador->id}}" class="btn btn-primary">Registrar Donación</a>
				{!!link_to_route('donantes.show', $title = 'Ver Información', $parameters = $Donador->id, $attributes = ['class'=>'btn btn-warning']);!!}</td>
			</tbody>
			@endforeach
			{!!$donor->render()!!}
		</table>
			{!!$donor->render()!!}        
	</div>
@stop
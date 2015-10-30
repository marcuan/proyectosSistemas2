@extends('layouts.principal')

@section('content')
	
	<?php $message=Session::get('message')?>
	@if($message == 'store')
	<div class="alert alert-success alert-dismissible alerta" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Creado. </strong> Usuario creado exitosamente.
	</div>
	@endif

	<div class="container col-xs-12">
		<h3 class="title" selected="selected">Usuarios</h3>
		<a href="/users/create" class="btn btn-danger">Crear Usuario</a>
		<table class="table">
			<thead>
				<th>Nombre</th>
				<th>Email</th>
				<th>Fecha de Creación</th>
			</thead>
			@foreach($users as $user)
			<tbody>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->created_at}}</td>
			</tbody>
			@endforeach
			{!!$users->render()!!}
		</table>
		{!!$users->render()!!}

	</div>
@stop
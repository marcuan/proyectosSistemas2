@extends('layouts.principal')

@section('content')
	
	<?php $message=Session::get('message')?>
	@if($message == 'store')
	<div class="alert alert-success alert-dismissible alerta" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Creado. </strong> Usuario creado exitosamente.
	</div>
	@endif
	@if($message == 'cambioStatus')
	<div class="alert alert-success alert-dismissible alerta" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Estatus de usuario modificado exitosamente. </strong>
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
				@if ($authUser->admin == 1)
					<th>Acciones</th>
				@endif
			</thead>
			@foreach($users as $user)
			<tbody>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->created_at}}</td>
				@if ($authUser->admin == 1)
					<td>
						@if ($user->admin == 1)
							<a href="/user/edit/{{$user->id}}/0" class="btn btn-primary">Remover Permiso de Administrador</a>
						@else
							<a href="/user/edit/{{$user->id}}/1" class="btn btn-primary">Volver Administrador</a>
							<a href="/user/privileges/{{$user->id}}" class="btn btn-primary">Editar Privilegios</a>
						@endif
					</td>
				@endif
			</tbody>
			@endforeach
			{!!$users->render()!!}
		</table>
		{!!$users->render()!!}

	</div>
@stop
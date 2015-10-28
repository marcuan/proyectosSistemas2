@extends('layouts.principal')

@section('content')
	<div class="container col-xs-12">
		<h3 class="title" selected="selected">Añadir nuevo usuario</h3>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Oops!</strong> Ha ocurrido un error con su petición.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form class="form-horizontal" role="form" method="POST" action="{{ url('/users') }}">
			{!! csrf_field() !!}

			<div class="form-group">
				<label class="col-md-4 control-label">Nombre</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Correo Electrónico</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Contraseña</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Confirmar Contraseña</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password_confirmation">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
						Registrar nuevo usuario
					</button>
				</div>
			</div>
		</form>
	</div>
@stop
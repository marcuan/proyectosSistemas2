@extends('auth.authbase')

@section('content')
	
	<h3 align="center">Reinicio de Contraseña</h3>

	<hr />

	@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		<hr />
	@endif

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Oops!</strong> Ha ocurrido un error con su petición.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		<hr />
	@endif

	<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
		{!! csrf_field() !!}

		<div class="form-group">
			<label class="col-md-4 control-label">Correo electrónico</label>
			<div class="col-md-6">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}">
			</div>
		</div>
		<hr />
		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary btn-block">Solicitar reinicio de contraseña</button>
			</div>
		</div>
	</form>

@stop
@extends('auth.authbase')

@section('content')

	@if (count($errors) <= 0)
		<h3 align="center">Ingreso al Sistema</h3>
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

	<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
		{!! csrf_field() !!}

		<div class="form-group">
			<label class="col-md-4 control-label">Correo electrónico</label>
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

		<div class="form-group" style="text-align: left;">
			<div class="col-md-6 col-md-offset-4">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> Recordar cuenta
					</label>
				</div>
			</div>
		</div>
	
		<hr />

		<div class="form-group">
			<div class="col-md-4 col-md-offset-4">
				<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
			</div>
		</div>
		<p class="olvido" align="right" style="display: none;">
			<a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidó su contraseña?</a>
		</p>
	</form>

@stop
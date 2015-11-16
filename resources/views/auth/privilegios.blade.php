@extends('layouts.principal')

@section('content')
	
	<style type="text/css">
		input[type="checkbox"] {
			width:  auto;
		}
	</style>

	<?php $message=Session::get('message')?>
	@if($message == 'actualizadoACL')
	<div class="alert alert-success alert-dismissible alerta" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Permisos actualizados exitosamente. </strong>
	</div>
	@endif
	
	<div class="container col-xs-12">
		<h3 class="title" selected="selected">Privilegios del usuario: {{$usuario->name}}</h3>
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/user/savePrivileges') }}">
			{!! csrf_field() !!}
			<input type="hidden" value="{{$usuario->id}}" name="usuario_id" />
			<h3>ONG<h3>
			<h4>Permisos sobre Donantes</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnr_crear', $privilegios))
								<input type="checkbox" name="dnr_crear" checked>
							@else
								<input type="checkbox" name="dnr_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnr_editar', $privilegios))
								<input type="checkbox" name="dnr_editar" checked>
							@else
								<input type="checkbox" name="dnr_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnr_ver', $privilegios))
								<input type="checkbox" name="dnr_ver" checked>
							@else
								<input type="checkbox" name="dnr_ver">
							@endif
							Ver Información
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnr_listar', $privilegios))
								<input type="checkbox" name="dnr_listar" checked>
							@else
								<input type="checkbox" name="dnr_listar">
							@endif
							Ver Listado de Donantes
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnc_crear', $privilegios))
								<input type="checkbox" name="dnc_crear" checked>
							@else
								<input type="checkbox" name="dnc_crear">
							@endif
							Hacer Donaciones
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnc_crear', $privilegios))
								<input type="checkbox" name="dnc_crear" checked>
							@else
								<input type="checkbox" name="dnc_crear">
							@endif
							Ver Listado de Donaciones
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('dnr_inhabilitar', $privilegios))
								<input type="checkbox" name="dnr_inhabilitar" checked>
							@else
								<input type="checkbox" name="dnr_inhabilitar">
							@endif
							Eliminar
						</label>
					</div>
				</div>
			</div>
			<h3>RESTAURANTE<h3>
			<h4>Permisos sobre Platillos</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('plt_crear', $privilegios))
								<input type="checkbox" name="plt_crear" checked>
							@else
								<input type="checkbox" name="plt_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('plt_editar', $privilegios))
								<input type="checkbox" name="plt_editar" checked>
							@else
								<input type="checkbox" name="plt_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('plt_listar', $privilegios))
								<input type="checkbox" name="plt_listar" checked>
							@else
								<input type="checkbox" name="plt_listar">
							@endif
							Ver Listado de platillos
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Temporada</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('temp_crear', $privilegios))
								<input type="checkbox" name="temp_crear" checked>
							@else
								<input type="checkbox" name="temp_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('temp_editar', $privilegios))
								<input type="checkbox" name="temp_editar" checked>
							@else
								<input type="checkbox" name="temp_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('temp_listar', $privilegios))
								<input type="checkbox" name="temp_listar" checked>
							@else
								<input type="checkbox" name="temp_listar">
							@endif
							Ver Listado de Temporada
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Materia Prima</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('mp_crear', $privilegios))
								<input type="checkbox" name="mp_crear" checked>
							@else
								<input type="checkbox" name="mp_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('mp_editar', $privilegios))
								<input type="checkbox" name="mp_editar" checked>
							@else
								<input type="checkbox" name="mp_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('mp_listar', $privilegios))
								<input type="checkbox" name="mp_listar" checked>
							@else
								<input type="checkbox" name="mp_listar">
							@endif
							Ver Listado de Materia prima
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Clientes</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cli_crear', $privilegios))
								<input type="checkbox" name="cli_crear" checked>
							@else
								<input type="checkbox" name="cli_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cli_editar', $privilegios))
								<input type="checkbox" name="cli_editar" checked>
							@else
								<input type="checkbox" name="cli_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cli_listar', $privilegios))
								<input type="checkbox" name="cli_listar" checked>
							@else
								<input type="checkbox" name="cli_listar">
							@endif
							Ver Listado de clientes
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-12" align="right">
					<button type="submit" class="btn btn-primary">
						Actualizar Privilegios
					</button>
				</div>
			</div>
		</form>
	</div>
@stop
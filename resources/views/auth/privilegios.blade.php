@extends('layouts.principal')

@section('content')
	
	<style type="text/css">
		input[type="checkbox"] {
			width:  auto;
		}
		h4 {
			border-bottom: 1px solid #CCC;
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
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('mp_cierr', $privilegios))
								<input type="checkbox" name="mp_cierr" checked>
							@else
								<input type="checkbox" name="mp_cierr">
							@endif
							Cierre de Materia Prima
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
			<h4>Permisos sobre Compras</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('comp_crear', $privilegios))
								<input type="checkbox" name="comp_crear" checked>
							@else
								<input type="checkbox" name="comp_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('comp_editar', $privilegios))
								<input type="checkbox" name="comp_editar" checked>
							@else
								<input type="checkbox" name="comp_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('comp_listar', $privilegios))
								<input type="checkbox" name="comp_listar" checked>
							@else
								<input type="checkbox" name="comp_listar">
							@endif
							Ver Listado de compras
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('comp_detalle', $privilegios))
								<input type="checkbox" name="comp_detalle" checked>
							@else
								<input type="checkbox" name="comp_detalle">
							@endif
							Ver detalle
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Ventas</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('ven_crear', $privilegios))
								<input type="checkbox" name="ven_crear" checked>
							@else
								<input type="checkbox" name="ven_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('ven_anular', $privilegios))
								<input type="checkbox" name="ven_anular" checked>
							@else
								<input type="checkbox" name="ven_anular">
							@endif
							Anular
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('ven_listar', $privilegios))
								<input type="checkbox" name="ven_listar" checked>
							@else
								<input type="checkbox" name="ven_listar">
							@endif
							Ver Listado de Ventas
						</label>
					</div>
				</div>
			</div>
			<h3>DESPENSA<h3>
			<h4>Permisos sobre Proveedores</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prov_crear', $privilegios))
								<input type="checkbox" name="prov_crear" checked>
							@else
								<input type="checkbox" name="prov_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prov_editar', $privilegios))
								<input type="checkbox" name="prov_editar" checked>
							@else
								<input type="checkbox" name="prov_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prov_inhabilitar', $privilegios))
								<input type="checkbox" name="prov_inhabilitar" checked>
							@else
								<input type="checkbox" name="prov_inhabilitar">
							@endif
							Inhabilitar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prov_listar', $privilegios))
								<input type="checkbox" name="prov_listar" checked>
							@else
								<input type="checkbox" name="prov_listar">
							@endif
							Ver Listado de Proveedores
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Ventas</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('ven_crear', $privilegios))
								<input type="checkbox" name="ven_crear" checked>
							@else
								<input type="checkbox" name="ven_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('ven_anular', $privilegios))
								<input type="checkbox" name="ven_anular" checked>
							@else
								<input type="checkbox" name="ven_anular">
							@endif
							Anular
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('ven_listar', $privilegios))
								<input type="checkbox" name="ven_listar" checked>
							@else
								<input type="checkbox" name="ven_listar">
							@endif
							Ver Listado de Ventas
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Productos</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prod_crear', $privilegios))
								<input type="checkbox" name="prod_crear" checked>
							@else
								<input type="checkbox" name="prod_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prod_editar', $privilegios))
								<input type="checkbox" name="prod_editar" checked>
							@else
								<input type="checkbox" name="prod_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('prod_listar', $privilegios))
								<input type="checkbox" name="prod_listar" checked>
							@else
								<input type="checkbox" name="prod_listar">
							@endif
							Ver Listado de Productos
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Consignaciones</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cons_crear', $privilegios))
								<input type="checkbox" name="cons_crear" checked>
							@else
								<input type="checkbox" name="cons_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cons_editar', $privilegios))
								<input type="checkbox" name="cons_editar" checked>
							@else
								<input type="checkbox" name="cons_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cons_ver', $privilegios))
								<input type="checkbox" name="cons_ver" checked>
							@else
								<input type="checkbox" name="cons_ver">
							@endif
							Ver Detalles
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cons_listar', $privilegios))
								<input type="checkbox" name="cons_listar" checked>
							@else
								<input type="checkbox" name="cons_listar">
							@endif
							Ver Listado de Consignaciones
						</label>
					</div>
				</div>
			</div>
			<h3>ESCUELA<h3>
			<h4>Permisos sobre Estudiantes</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('est_crear', $privilegios))
								<input type="checkbox" name="est_crear" checked>
							@else
								<input type="checkbox" name="est_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('est_editar', $privilegios))
								<input type="checkbox" name="est_editar" checked>
							@else
								<input type="checkbox" name="est_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('est_ver', $privilegios))
								<input type="checkbox" name="est_ver" checked>
							@else
								<input type="checkbox" name="est_ver">
							@endif
							Ver
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('est_inhabilitar', $privilegios))
								<input type="checkbox" name="est_inhabilitar" checked>
							@else
								<input type="checkbox" name="est_inhabilitar">
							@endif
							Inhabilitar
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('est_cursos', $privilegios))
								<input type="checkbox" name="est_cursos" checked>
							@else
								<input type="checkbox" name="est_cursos">
							@endif
							Asignar/Desasignar Cursos
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('est_listar', $privilegios))
								<input type="checkbox" name="est_listar" checked>
							@else
								<input type="checkbox" name="est_listar">
							@endif
							Ver Listado de Estudiantes
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Cursos</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_crear', $privilegios))
								<input type="checkbox" name="cur_crear" checked>
							@else
								<input type="checkbox" name="cur_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_editar', $privilegios))
								<input type="checkbox" name="cur_editar" checked>
							@else
								<input type="checkbox" name="cur_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_ver', $privilegios))
								<input type="checkbox" name="cur_ver" checked>
							@else
								<input type="checkbox" name="cur_ver">
							@endif
							Ver
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_inhabilitar', $privilegios))
								<input type="checkbox" name="cur_inhabilitar" checked>
							@else
								<input type="checkbox" name="cur_inhabilitar">
							@endif
							Inhabilitar
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_estudiantes', $privilegios))
								<input type="checkbox" name="cur_estudiantes" checked>
							@else
								<input type="checkbox" name="cur_estudiantes">
							@endif
							Asignar/Desasignar Estudiantes
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_estudiantes_ver', $privilegios))
								<input type="checkbox" name="cur_estudiantes_ver" checked>
							@else
								<input type="checkbox" name="cur_estudiantes_ver">
							@endif
							Ver Estudiantes Asignados
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_horario_add', $privilegios))
								<input type="checkbox" name="cur_horario_add" checked>
							@else
								<input type="checkbox" name="cur_horario_add">
							@endif
							Agregar Horarios
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_horario_edit', $privilegios))
								<input type="checkbox" name="cur_horario_edit" checked>
							@else
								<input type="checkbox" name="cur_horario_edit">
							@endif
							Editar Horarios
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_horario_del', $privilegios))
								<input type="checkbox" name="cur_horario_del" checked>
							@else
								<input type="checkbox" name="cur_horario_del">
							@endif
							Eliminar Horarios
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_horarios', $privilegios))
								<input type="checkbox" name="cur_horarios" checked>
							@else
								<input type="checkbox" name="cur_horarios">
							@endif
							Ver Horarios
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('cur_listar', $privilegios))
								<input type="checkbox" name="cur_listar" checked>
							@else
								<input type="checkbox" name="cur_listar">
							@endif
							Ver Listado de Cursos
						</label>
					</div>
				</div>
			</div>
			<h4>Permisos sobre Maestros</h4>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('maes_crear', $privilegios))
								<input type="checkbox" name="maes_crear" checked>
							@else
								<input type="checkbox" name="maes_crear">
							@endif
							Crear
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('maes_editar', $privilegios))
								<input type="checkbox" name="maes_editar" checked>
							@else
								<input type="checkbox" name="maes_editar">
							@endif
							Editar
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('maes_ver', $privilegios))
								<input type="checkbox" name="maes_ver" checked>
							@else
								<input type="checkbox" name="maes_ver">
							@endif
							Ver
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('maes_inhabilitar', $privilegios))
								<input type="checkbox" name="maes_inhabilitar" checked>
							@else
								<input type="checkbox" name="maes_inhabilitar">
							@endif
							Inhabilitar
						</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('maes_cursos', $privilegios))
								<input type="checkbox" name="maes_cursos" checked>
							@else
								<input type="checkbox" name="maes_cursos">
							@endif
							Asignar/Desasignar Cursos
						</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="checkbox">
						<label style="text-align: left">
							@if (array_key_exists('maes_listar', $privilegios))
								<input type="checkbox" name="maes_listar" checked>
							@else
								<input type="checkbox" name="maes_listar">
							@endif
							Ver listado de Maestros
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
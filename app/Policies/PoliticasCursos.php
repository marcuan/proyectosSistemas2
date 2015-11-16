<?php

namespace RED\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasCursos
{
	use HandlesAuthorization;

   /**
	 * Determina si el usuario tiene permiso de listar cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function editar(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_editar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de ver cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function ver(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_ver') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de inhabilitar cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function inhabilitar(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_inhabilitar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de asignar/desasignar estudiantes a los cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function estudiantes(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_estudiantes') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de asignar/desasignar estudiantes a los cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function estudiantes_ver(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_estudiantes_ver') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear horarios a los cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function horario_agregar(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_horario_add') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar horarios de los cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function horario_editar(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_horario_edit') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de eliminar horarios de los cursos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function horario_eliminar(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_horario_del') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de ver horarios.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function ver_horarios(User $usuario)
	{
		if (strpos($usuario->acl, 'cur_horarios') !== false)
			return true;
		return false;
	}
}

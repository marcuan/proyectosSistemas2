<?php

namespace RED\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasEstudiantes
{
	use HandlesAuthorization;

	/**
	 * Determina si el usuario tiene permiso de listar estudiantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'est_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear estudiantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'est_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar estudiantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function editar(User $usuario)
	{
		if (strpos($usuario->acl, 'est_editar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de ver estudiantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function ver(User $usuario)
	{
		if (strpos($usuario->acl, 'est_ver') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de inhabilitar estudiantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function inhabilitar(User $usuario)
	{
		if (strpos($usuario->acl, 'est_inhabilitar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de asignar/desasignar cursos a los estudiantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function cursos(User $usuario)
	{
		if (strpos($usuario->acl, 'est_cursos') !== false)
			return true;
		return false;
	}
}

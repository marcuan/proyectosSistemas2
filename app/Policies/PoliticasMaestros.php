<?php

namespace RED\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasMaestros
{
	use HandlesAuthorization;

	/**
	 * Determina si el usuario tiene permiso de listar maestros.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'maes_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear maestros.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'maes_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar maestros.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function editar(User $usuario)
	{
		if (strpos($usuario->acl, 'maes_editar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de ver maestros.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function ver(User $usuario)
	{
		if (strpos($usuario->acl, 'maes_ver') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de inhabilitar maestros.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function inhabilitar(User $usuario)
	{
		if (strpos($usuario->acl, 'maes_inhabilitar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de asignar/desasignar cursos a los maestros.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function cursos(User $usuario)
	{
		if (strpos($usuario->acl, 'maes_cursos') !== false)
			return true;
		return false;
	}
}

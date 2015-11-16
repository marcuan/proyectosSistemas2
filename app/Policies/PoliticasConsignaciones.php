<?php

namespace RED\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasConsignaciones
{
	use HandlesAuthorization;

	/**
	 * Determina si el usuario tiene permiso de listar consignaciones.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'cons_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear consignaciones.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'cons_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar consignaciones.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function editar(User $usuario)
	{
		if (strpos($usuario->acl, 'cons_editar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de ver consignaciones.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function ver(User $usuario)
	{
		if (strpos($usuario->acl, 'cons_ver') !== false)
			return true;
		return false;
	}
}

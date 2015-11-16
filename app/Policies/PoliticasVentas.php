<?php

namespace RED\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasVentas
{
	use HandlesAuthorization;

	/**
	 * Determina si el usuario tiene permiso de listar ventas.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'ven_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear ventas.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'ven_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de anular ventas.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function anular(User $usuario)
	{
		if (strpos($usuario->acl, 'ven_anular') !== false)
			return true;
		return false;
	}
}

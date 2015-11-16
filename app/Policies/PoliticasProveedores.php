<?php

namespace RED\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasProveedores
{
	use HandlesAuthorization;

	/**
	 * Determina si el usuario tiene permiso de listar proveedores.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'prov_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear proveedores.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'prov_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar proveedores.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function editar(User $usuario)
	{
		if (strpos($usuario->acl, 'prov_editar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de inhabilitar proveedores.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function inhabilitar(User $usuario)
	{
		if (strpos($usuario->acl, 'prov_inhabilitar') !== false)
			return true;
		return false;
	}
}

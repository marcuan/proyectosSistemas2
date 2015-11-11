<?php

namespace RED\policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use RED\Ong\User;

class PoliticasPlatillos
{

	use HandlesAuthorization;

	/**
	 * Determina si el usuario tiene permiso de listar platillos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function listar(User $usuario)
	{
		if (strpos($usuario->acl, 'plt_listar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de crear donantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function crear(User $usuario)
	{
		if (strpos($usuario->acl, 'plt_crear') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de editar donantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	public function editar(User $usuario)
	{
		if (strpos($usuario->acl, 'plt_editar') !== false)
			return true;
		return false;
	}

	/**
	 * Determina si el usuario tiene permiso de ver platillos.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */
	/**public function ver(User $usuario)
	{
		if (strpos($usuario->acl, 'dnr_ver') !== false)
			return true;
		return false;
	}*/

	/**
	 * Determina si el usuario tiene permiso de inhabilitar donantes.
	 *
	 * @param  \App\User  $usuario
	 * @return bool
	 */

	/**public function inhabilitar(User $usuario)
	{
		if (strpos($usuario->acl, 'dnr_inhabilitar') !== false)
			return true;
		return false;
	}*/
}
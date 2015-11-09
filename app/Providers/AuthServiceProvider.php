<?php

namespace RED\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

# uses para los modelos de la aplicación y las políticas de cada modelo
use RED\Ong\Donor;
use RED\Ong\Donation;
use RED\Policies\PoliticasDonadores;
use RED\Policies\PoliticasDonaciones;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		Donor::class => PoliticasDonadores::class,
		Donation::class => PoliticasDonaciones::class,
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
	 * @return void
	 */
	public function boot(GateContract $gate)
	{
		parent::registerPolicies($gate);

		$gate->before(function ($user, $ability) {
			if ($user->isAdmin()) {
				return true;
			}
		});
	}
}
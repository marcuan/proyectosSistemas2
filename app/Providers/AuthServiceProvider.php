<?php

namespace RED\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

# uses para los modelos de la aplicación y las políticas de cada modelo
use RED\Ong\Donor;
use RED\Ong\Donation;
use RED\Restaurante\Platillo;
use RED\Restaurante\Temporada;
use RED\Restaurante\MateriaPrima;
use RED\Restaurante\Cliente;
use RED\Restaurante\Compra;
use RED\Despensa\Proveedore;
use RED\Despensa\Ventum;
use RED\Despensa\Producto;
use RED\Despensa\Consignacion;
use RED\Escuela\Estudiante;
use RED\Escuela\Curso;
use RED\Escuela\Maestro;
# policies / politicas para los modelos listados anteriormente
use RED\Policies\PoliticasDonadores;
use RED\Policies\PoliticasDonaciones;
use RED\policies\PoliticasPlatillos;
use RED\policies\PoliticasTemporada;
use RED\policies\PoliticasMateriaPrima;
use RED\policies\PoliticasClientes;
use RED\policies\PoliticasCompras;
use RED\Policies\PoliticasProveedores;
use RED\Policies\PoliticasVentas;
use RED\Policies\PoliticasProductos;
use RED\Policies\PoliticasConsignaciones;
use RED\Policies\PoliticasEstudiantes;
use RED\Policies\PoliticasCursos;
use RED\Policies\PoliticasMaestros;

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
		Platillo::class => PoliticasPlatillos::class,
		Temporada::class => PoliticasTemporada::class,
		MateriaPrima::class => PoliticasMateriaPrima::class,
		Cliente::class => PoliticasClientes::class,
		Compra::class => PoliticasCompras::class,
		Proveedore::class => PoliticasProveedores::class,
		Ventum::class => PoliticasVentas::class,
		Producto::class => PoliticasProductos::class,
		Consignacion::class => PoliticasConsignaciones::class,
		Estudiante::class => PoliticasEstudiantes::class,
		Curso::class => PoliticasCursos::class,
		Maestro::class => PoliticasMaestros::class
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
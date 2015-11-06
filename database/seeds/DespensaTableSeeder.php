<?php

use Illuminate\Database\Seeder;
use RED\Despensa\Consignacion;
use RED\Despensa\DetalleConsignacion;
use RED\Despensa\DetalleVentum;
use RED\Despensa\Producto;
use RED\Despensa\Ventum;
use RED\Restaurante\Cliente;
use RED\Restaurante\Temporada;
use RED\Restaurante\Platillo;
use Faker\Factory as Faker;

class DespensaTableSeeder extends Seeder
{
	/**
	 * Run the database seeds for the ong module.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create(); //campos
		
		DB::table('clientes')->delete();
		foreach (range(1,5) as $index) {
			$cliente = new Cliente;
			$cliente->nombre = $faker->firstName;
			$cliente->nit = $faker->numberBetween($min = 1000000, $max = 9000000);
			$cliente->telefono = $faker->phoneNumber;
			$cliente->dirección = $faker->address;
			$cliente->save();
		}
		
		DB::table('productos')->delete();
		foreach (range(1,25) as $index) {
			$productos = new Producto;
			$productos->codigo = $faker->numerify('P-#####');
			$productos->nombreProducto = $faker->word;
			$productos->detalleProducto = $faker->sentence;
			$productos->precioVenta = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
			$productos->existencia = $faker->randomDigit;
			$productos->comision = $faker->randomDigit;
			$productos->save();
		}
		
		DB::table('consignacion')->delete();
		foreach (range(1,10) as $index) {
			$consig = new Consignacion;
			$consig->codigo = $faker->numerify('C-###');
			$consig->fechaInicial = $faker->date($format = 'Y-m-d');
			$consig->fechaFinal = date('Y-m-d', strtotime($consig->date_start ." + 10 days"));
			$consig->detalleConsignacion = $faker->sentence;
			$consig->proveedores_id = $faker->numberBetween($min = 1, $max = 5);
			$consig->save();
		}
		DB::table('detalleConsignacion')->delete();
		foreach (range(1,10) as $index) {
			$dcons = new DetalleConsignacion;
			$dcons->consignacion_id = $faker->numberBetween($min = 1, $max = 10);
			$dcons->cantidad = $faker->randomDigit;
			$dcons->precio = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
			$dcons->producto_id = $faker->numberBetween($min = 1, $max = 10);
			$dcons->save();
		}
		DB::table('venta')->delete();
		foreach (range(1,10) as $index) {
			$dvent = new Ventum;
			$dvent->fechaVenta = $faker->date($format = 'Y-m-d');
			$dvent->descuento = $faker->randomDigit;
			$dvent->subtotal = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
		    $dvent->total = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
			$dvent->clientes_id = $faker->numberBetween($min = 1, $max = 5);
			$dvent->save();
		}
		DB::table('temporada')->delete();
		foreach (range(1,1) as $index) {
			$dtemp = new Temporada;
			$dtemp->nombre = 'temporada';
			$dtemp->save();
		}
		DB::table('platillos')->delete();
		foreach (range(1,1) as $index) {
			$dplat = new Platillo;
			$dplat->temporada_id = $faker->numberBetween($min = 1, $max = 1);
			$dplat->nombre = 'temporada';
			$dplat->precio=0;
		    $dplat->descripcion = 'para detalle de venta';
			$dplat->save();
		}
		DB::table('detalleventa')->delete();
		foreach (range(1,10) as $index) {
			$dvent = new Detalleventum;
			$dvent->total = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
			$dvent->cantidad = $faker->randomDigit;
			$dvent->tiendaorestaurante = $faker->numberBetween($min = 2, $max = 2);
			$dvent->venta_id = $faker->numberBetween($min = 1, $max = 10);
			$dvent->producto_id = $faker->numberBetween($min = 1, $max = 20);
			$dvent->platillo_id = $faker->numberBetween($min = 1, $max = 1);
			$dvent->save();
		}
		
		
		}
	}

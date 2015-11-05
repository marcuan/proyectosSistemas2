<?php

use Illuminate\Database\Seeder;
use RED\Despensa\Proveedore;
use Faker\Factory as Faker;

class ProveedorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  	    $faker = Faker::create();


  	    //Seeder de Proveedores
  	    DB::table('proveedores')->delete();
  	    foreach (range(1, 20) as $index) 
        {
  	    	$proveedor = new Proveedore;
  	    	$proveedor->nombre = $faker->firstName;
  	    	$proveedor->telefono = $faker->randomNumber;
  	    	$proveedor->direccion = $faker->city;
          $proveedor->save();
  	    }
  	}
}

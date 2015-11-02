<?php

use Illuminate\Database\Seeder;
use RED\Ong\Activity;
use RED\Ong\Donor;
use RED\Ong\Donation;
use Faker\Factory as Faker;

class OngTableSeeder extends Seeder
{
	/**
	 * Run the database seeds for the ong module.
	 *
	 * @return void
	 */
	public function run()
	{
		# Faker para crear los campos de las tablas
		$faker = Faker::create();

		# Seeder de Actividades
		DB::table('activity')->delete();
		foreach (range(1,20) as $index) {
			$actividad = new Activity;
			$actividad->name = $faker->sentence;
			$actividad->address = $faker->address;
			$actividad->description = $faker->text(100);
			$actividad->date_start = $faker->date($format = 'Y-m-d');
			$actividad->date_end = date('Y-m-d', strtotime($actividad->date_start ." + 3 days"));
			$actividad->capacity = $faker->randomNumber($nbDigits = 2);
			$actividad->save();
		}

		# Seeder de Donantes y Donaciones
		DB::table('donor')->delete();
		DB::table('donation')->delete();
		foreach (range(1,20) as $index) {
			$donor = new Donor;
			$donor->donor_name = $faker->firstName;
			$donor->donor_lastname = $faker->lastName;
			$donor->adress = $faker->address;
			$donor->e_mail = $faker->email;
			$donor->active = true;
			$donor->save();

			# Seeder de Actividades para el Donante
			foreach (range(1,8) as $index) {
				$donation = new Donation;
				$donation->monto = $faker->randomNumber($nbDigits = 4);
				$donation->descripcion = $faker->text(70);
				$donation->id_donor = $donor->id;
				$donation->save();
			}
		}
	}
}
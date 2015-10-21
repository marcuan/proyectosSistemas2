<?php

use Illuminate\Database\Seeder;
use RED\Escuela\Genero;


class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genero')->delete();

        Genero::create(['genero' => 'Fenemino']);
        Genero::create(['genero' => 'Masculino']);

        
    }
}

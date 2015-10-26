<?php

use Illuminate\Database\Seeder;
use RED\Escuela\Genero;
use RED\Escuela\Telefono;
use RED\Escuela\Estudiante;
use RED\Escuela\Maestro;
use RED\Escuela\Curso;
use Faker\Factory as Faker;


class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiante')->delete();
        DB::table('maestro')->delete();
        DB::table('genero')->delete();
        DB::table('curso')->delete();
        

        Genero::create(['genero' => 'Fenemino']);
        Genero::create(['genero' => 'Masculino']);


        $faker = Faker::create();

        foreach (range(1,20) as $index) {
            $estudiante = new Estudiante;
            $estudiante->codigo = $faker->numerify('est-####');
            $estudiante->nombre_estudiante = $faker->firstName;
            $estudiante->apellido_estudiante = $faker->lastName;
            $estudiante->fecha_nacimiento = $faker->date($format = 'Y-m-d', $max = 'now');
            $estudiante->direccion = $faker->address;
            $estudiante->correo = $faker->email;
            $estudiante->genero_id = 1;
            $estudiante->save();

            $telefono = new Telefono;
            $telefono->numero_telefono =  $faker->phoneNumber;
            $telefono->estudiante_id = $estudiante->id;
            $telefono->save();
        }

        foreach (range(1,20) as $index) {
            $maestro = new Maestro;
            $maestro->codigo = $faker->numerify('cat-####');
            $maestro->nombre_maestro = $faker->firstName;
            $maestro->apellido_maestro = $faker->lastName;
            $maestro->fecha_nacimiento = $faker->date($format = 'Y-m-d', $max = 'now');
            $maestro->direccion = $faker->address;
            $maestro->correo = $faker->email;
            $maestro->genero_id = 1;
            $maestro->save();

            $telefono = new Telefono;
            $telefono->numero_telefono =  $faker->phoneNumber;
            $telefono->maestro_id = $maestro->id;
            $telefono->save();
        }

        foreach (range(1,20) as $index) {
            $curso = new Curso;
            $curso->codigo = $faker->numerify('C-####');
            $curso->nombre_curso = $faker->word;
            $curso->descripcion = $faker->sentence($nbWords = 6);
            $curso->fecha_inicio = $faker->date($format = 'Y-m-d', $max = 'now');
            $curso->fecha_fin = $faker->date($format = 'Y-m-d', $max = 'now');
            $curso->max_estudiantes = $faker->numberBetween($min = 10, $max = 30);
            $curso->save();
       }





        
    }
}

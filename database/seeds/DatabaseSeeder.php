<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(GeneroTableSeeder::class);
        $this->call(AdminAuthTableSeeder::class);

        Model::reguard();
    }
}

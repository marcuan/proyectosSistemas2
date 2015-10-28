<?php

use Illuminate\Database\Seeder;
use RED\Ong\User;


class AdminAuthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        # Usuario: admin@mail.com
        # Password: !UrL_p2@
        User::create(['name' => 'Administrador', 'email' => 'admin@mail.com', 'password' => '$2y$10$2omZfzNdXnP0.HyrIB5e6.TrBFLCaBG9Yk4Xhh9hBgch/fktME/Qq']);
    }
}
<?php

use Illuminate\Database\Seeder;
use App\User;

class TablaUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crea 10 usuarios
        factory(User::class, 10)->create();
    }
}

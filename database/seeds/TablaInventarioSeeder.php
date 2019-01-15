<?php

use Illuminate\Database\Seeder;

class TablaInventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crea 10 usuarios
        factory(\App\Inventario::class, 30)->create();
    }
}

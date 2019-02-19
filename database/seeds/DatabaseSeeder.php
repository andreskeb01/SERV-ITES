<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TablaPermisosSeeder::class);
        $this->call(TablaLicenciaturasSeeder::class);
        $this->call(TablaCategoriasSeeder::class);
        $this->call(TablaInventarioSeeder::class);
    }
}

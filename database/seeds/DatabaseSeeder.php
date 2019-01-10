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
        $this->call(TablaUsuariosSeeder::class);
        $this->call(TablaPermisosSeeder::class);
        $this->call(TablaLibrosSeeder::class);
        $this->call(TablaLicenciaturasSeeder::class);
        $this->call(TablaMateriasSeeder::class);
    }
}

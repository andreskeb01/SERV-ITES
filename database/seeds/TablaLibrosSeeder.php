<?php

use Illuminate\Database\Seeder;

class TablaLibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Libro::class, 30)->create();
    }
}

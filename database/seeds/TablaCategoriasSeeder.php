<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class TablaCategoriasSeeder extends Seeder
{
    /**
     * Crea las semillas y llena la tabla de Categorias.
     *
     * @return void
     */
    public function run()
    {
        factory(Categoria::class)->create([
            'nombre' => 'equipo de computo',
            'descripcion' => 'Todos los equipos relacionados con la computación',
        ]);

        factory(Categoria::class)->create([
            'nombre' => 'equipo de sonido',
            'descripcion' => 'Todos los equipos relacionados con sonido',
        ]);

        factory(Categoria::class)->create([
            'nombre' => 'equipo de proyeccion',
            'descripcion' => 'Todos los equipos relacionados con proyeccion de multimedia',
        ]);

        factory(Categoria::class)->create([
            'nombre' => 'accesorios de computo',
            'descripcion' => 'Accesorios de computo',
        ]);
    }
}

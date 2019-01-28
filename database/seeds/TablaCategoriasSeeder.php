<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\TipoCategoria;

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
            'nombre' => 'Laptop',
            'descripcion' => 'computadoras portatiles del centro de computo',
        ]);

        factory(Categoria::class)->create([
            'nombre' => 'Computadora de escritorio',
            'descripcion' => 'computadoras de escritorio del centro de computo',
        ]);

       $mouse = new Categoria([
            'nombre' => 'Mouse',
            'descripcion' => 'Dispositivo de las computadoras de escritorio',
        ]);

        $teclado = new Categoria([
            'nombre' => 'Teclado',
            'descripcion' => 'Dispositivo de las computadoras de escritorio',
        ]);

        factory(Categoria::class)->create([
            'nombre' => 'Proyector',
            'descripcion' => 'Dispositivo para proyectar multimedia, trabajos o tareas',
        ]);

        $control = new Categoria([
            'nombre' => 'Control',
            'descripcion' => 'utilizado para controlar los dispositivos',
        ]);

        $cable = new Categoria([
            'nombre' => 'Cables',
            'descripcion' => 'herrramienta para los dispositivos',
        ]);

        factory(Categoria::class)->create([
            'nombre' => 'UTP',
            'descripcion' => 'utilizado para conexion de red',
        ]);

        $mouse->save();
        $teclado->save();
        $control->save();
        $cable->save();

        $alambrico = new TipoCategoria([
            'nombre' => 'alambrico'
        ]);

        $inalambrico = new TipoCategoria([
            'nombre' => 'inalambrico'
        ]);

        $mouse->tipos()->saveMany([
         $alambrico,
         $inalambrico
        ]);

        $teclado->tipos()->saveMany([
            $alambrico,
            $inalambrico
        ]);

        $proyector = new TipoCategoria([
            'nombre' => 'proyector'
        ]);

        $tv = new TipoCategoria([
            'nombre' => 'tv'
        ]);

        $control->tipos()->saveMany([
           $proyector,
           $tv
        ]);

        $vga = new TipoCategoria([
            'nombre' => 'vga'
        ]);

        $hdmi = new TipoCategoria([
            'nombre' => 'hdmi'
        ]);

        $cable->tipos()->saveMany([
            $vga,
            $hdmi
        ]);


    }
}

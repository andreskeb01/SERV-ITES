<?php

use Illuminate\Database\Seeder;
use App\Inventario;
use App\Categoria;
use App\Tipo;

class TablaInventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------Dispositivos-----------------------------------
        $lap01 = factory(Inventario::class)->create([
            'nombre' => 'hp-g205',
            'num_serie' => '5cd73300nn',
            'modelo' => 'g205',
            'descripcion' => 'laptop color negro',
            'clave' => 'pc-cc-01',
        ]);

        $lap02 = factory(Inventario::class)->create([
            'nombre' => 'hp-g205',
            'num_serie' => '5cd73089cf',
            'modelo' => 'g205',
            'descripcion' => 'laptop color negro',
            'clave' => 'pc-cc-02',
        ]);

        $lap03 = factory(Inventario::class)->create([
            'nombre' => 'hp-g206',
            'num_serie' => '5gh6890rg',
            'modelo' => 'g205',
            'descripcion' => 'laptop color gris',
            'clave' => 'pc-cc-03',
        ]);

        $pc01 = factory(Inventario::class)->create([
            'nombre' => 'Acer',
            'num_serie' => '7859680vg',
            'modelo' => 'aspire z1650',
            'descripcion' => 'pc todo en uno color negro',
            'clave' => 'comp-cc-01',
        ]);

        $pc02 = factory(Inventario::class)->create([
            'nombre' => 'Acer',
            'num_serie' => '7890679bn',
            'modelo' => 'aspire z1660',
            'descripcion' => 'pc todo en uno color negro',
            'clave' => 'comp-cc-02',
        ]);

        $pc03 = factory(Inventario::class)->create([
            'nombre' => 'Acer',
            'num_serie' => '8926348kj',
            'modelo' => 'aspire',
            'descripcion' => 'pc todo en uno color negro',
            'clave' => 'comp-cc-03',
        ]);

        $mouse01 = factory(Inventario::class)->create([
            'nombre' => 'spectra-mouse',
            'num_serie' => '64287',
            'modelo' => 'pkb030',
            'descripcion' => 'mouse color negro',
            'clave' => 'mouse-cc-01',
        ]);

        $mouse02 = factory(Inventario::class)->create([
            'nombre' => 'spectra-mouse',
            'num_serie' => '64288',
            'modelo' => 'pkb030',
            'descripcion' => 'mouse color negro',
            'clave' => 'mouse-cc-02',
        ]);


        $teclado01 = factory(Inventario::class)->create([
            'nombre' => 'spectra-teclado',
            'num_serie' => '64287',
            'modelo' => 'pkb030',
            'descripcion' => 'teclado color negro',
            'clave' => 'teclado-cc-01',
        ]);

        $teclado02 = factory(Inventario::class)->create([
            'nombre' => 'spectra-teclado',
            'num_serie' => '64288',
            'modelo' => 'pkb030',
            'descripcion' => 'teclado color negro',
            'clave' => 'teclado-cc-02',
        ]);

        $proyector01 = factory(Inventario::class)->create([
            'nombre' => 'proyector-EPSON',
            'num_serie' => '64898Y54GGRTYGFPIHG',
            'modelo' => 'SEIKO EPSON CORP',
            'descripcion' => 'Color blanco',
            'clave' => 'proyector-salon-01',
        ]);

        $proyector02 = factory(Inventario::class)->create([
            'nombre' => 'proyector-BENQ',
            'num_serie' => '6752CFGH',
            'modelo' => 'BENQ-90X',
            'descripcion' => 'Color gris',
            'clave' => 'cvga-cc-01',
        ]);

        $hdmi01 = factory(Inventario::class)->create([
            'nombre' => 'cable-HDMI',
            'num_serie' => '67gigigio',
            'modelo' => 'STEREN-089',
            'descripcion' => 'cable color negro',
            'clave' => 'chdmi-cc-01',
        ]);

        $vga01 = factory(Inventario::class)->create([
            'nombre' => 'cable-VGA',
            'num_serie' => '68FHHSA',
            'modelo' => 'STEREN-085',
            'descripcion' => 'cable color negro',
            'clave' => 'cvga-cc-01',
        ]);

        $utp01 = factory(Inventario::class)->create([
            'nombre' => 'cable-UTP',
            'num_serie' => '98JHSBC',
            'modelo' => 'STEREN-087',
            'descripcion' => 'cable utp color blanco',
            'clave' => 'cutp-cc-01',
        ]);

        //---------Categorias de dispositivos----------------------------------------
        $categoria_laptop = new Categoria([
            'nombre' => 'Laptop',
            'descripcion' => 'computadoras portatiles del centro de computo',
        ]);
        $categoria_laptop->save();

        $categoria_pc = new Categoria([
            'nombre' => 'Computadora de escritorio',
            'descripcion' => 'computadoras de escritorio del centro de computo',
        ]);
        $categoria_pc->save();

        $categoria_mouse = new Categoria([
            'nombre' => 'Mouse',
            'descripcion' => 'Dispositivo de las computadoras de escritorio',
        ]);
        $categoria_mouse->save();

        $categoria_teclado = new Categoria([
            'nombre' => 'Teclado',
            'descripcion' => 'Dispositivo de las computadoras de escritorio',
        ]);
        $categoria_teclado->save();

        $categoria_proyector = new Categoria([
            'nombre' => 'Proyector',
            'descripcion' => 'Dispositivo para proyectar multimedia, trabajos o tareas',
        ]);
        $categoria_proyector->save();

        $categoria_control = new Categoria([
            'nombre' => 'Control',
            'descripcion' => 'utilizado para controlar los dispositivos',
        ]);
        $categoria_control->save();

        $categoria_cable = new Categoria([
            'nombre' => 'Cable',
            'descripcion' => 'Todos los tipos de cables utilizados en algun dispositivo',
        ]);
        $categoria_cable->save();

        $categoria_red = new Categoria([
            'nombre' => 'red',
            'descripcion' => 'Componentes que se utilizan en la red del instituto',
        ]);
        $categoria_red->save();

        //------Tipos para las categorias de los dispositivos----------------------
        $alambrico = new Tipo([
            'tipo' => 'alambrico'
        ]);

        $alambrico->save();

        $inalambrico = new Tipo([
            'tipo' => 'inalambrico'
        ]);

        $inalambrico->save();

        $proyector = new Tipo([
            'tipo' => 'proyector'
        ]);

        $proyector->save();

        $tv = new Tipo([
            'tipo' => 'tv'
        ]);
        $tv->save();

        $vga = new Tipo([
            'tipo' => 'vga'
        ]);
        $vga->save();

        $hdmi = new Tipo([
            'tipo' => 'hdmi'
        ]);
        $hdmi->save();

        $utp = new Tipo([
            'tipo' => 'UTP'
        ]);
        $utp->save();

        //----Agrega a cada categoria su respectivo tipo
        $categoria_mouse->tipos()->attach($alambrico->id);
        $categoria_mouse->tipos()->attach($inalambrico->id);

        $categoria_teclado->tipos()->attach($alambrico->id);
        $categoria_teclado->tipos()->attach($inalambrico->id);

        $categoria_control->tipos()->attach($proyector->id);
        $categoria_control->tipos()->attach($tv->id);

        $categoria_cable->tipos()->attach($vga->id);
        $categoria_cable->tipos()->attach($hdmi->id);

        $categoria_red->tipos()->attach($utp->id);

        //----Agrega cada dispositivo a su respectiva categoria--------------------
        $categoria_pc->inventarios()->attach($pc01->id, ['tipo_id' => null]);
        $categoria_pc->inventarios()->attach($pc02->id, ['tipo_id' => null]);
        $categoria_pc->inventarios()->attach($pc03->id, ['tipo_id' => null]);
//        $lap01->categoria()->save($categoria_laptop);
//        $lap02->categoria()->save($categoria_laptop);
//        $lap03->categoria()->save($categoria_laptop);
//        $mouse01->categoria()->save($categoria_mouse);
//        $mouse02->categoria()->save($categoria_mouse);
//        $teclado01->categoria()->save($categoria_teclado);
//        $teclado02->categoria()->save($categoria_teclado);
//        $proyector01->categoria()->save($categoria_proyector);
//        $proyector02->categoria()->save($categoria_proyector);
//        $vga01->categoria()->save($categoria_cable);
//        $hdmi01->categoria()->save($categoria_cable);
//        $utp01->categoria()->save($categoria_cable);

    }
}

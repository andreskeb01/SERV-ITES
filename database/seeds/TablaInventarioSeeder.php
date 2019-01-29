<?php

use Illuminate\Database\Seeder;
use App\Inventario;

class TablaInventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Inventario::class)->create([
            'nombre' => 'hp-g205',
            'num_serie' => '5cd73300nn',
            'modelo' => 'g205',
            'descripcion' => 'laptop color negro',
            'clave' => 'pc-cc-01',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'hp-g205',
            'num_serie' => '5cd73089cf',
            'modelo' => 'g205',
            'descripcion' => 'laptop color negro',
            'clave' => 'pc-cc-02',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'hp-g206',
            'num_serie' => '5gh6890rg',
            'modelo' => 'g205',
            'descripcion' => 'laptop color gris',
            'clave' => 'pc-cc-03',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'Acer',
            'num_serie' => '7859680vg',
            'modelo' => 'aspire z1650',
            'descripcion' => 'pc todo en uno color negro',
            'clave' => 'comp-cc-01',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'Acer',
            'num_serie' => '7890679bn',
            'modelo' => 'aspire z1660',
            'descripcion' => 'pc todo en uno color negro',
            'clave' => 'comp-cc-02',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'Acer',
            'num_serie' => '8926348kj',
            'modelo' => 'aspire',
            'descripcion' => 'pc todo en uno color negro',
            'clave' => 'comp-cc-03',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'spectra-mouse',
            'num_serie' => '64287',
            'modelo' => 'pkb030',
            'descripcion' => 'mouse color negro',
            'clave' => 'mouse-cc-01',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'spectra-mouse',
            'num_serie' => '64288',
            'modelo' => 'pkb030',
            'descripcion' => 'mouse color negro',
            'clave' => 'mouse-cc-03',
        ]);


        factory(Inventario::class)->create([
            'nombre' => 'spectra-teclado',
            'num_serie' => '64287',
            'modelo' => 'pkb030',
            'descripcion' => 'teclado color negro',
            'clave' => 'teclado-cc-01',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'spectra-teclado',
            'num_serie' => '64288',
            'modelo' => 'pkb030',
            'descripcion' => 'teclado color negro',
            'clave' => 'teclado-cc-03',
        ]);


        factory(Inventario::class)->create([
            'nombre' => 'proyector-EPSON',
            'num_serie' => '64898Y54GGRTYGFPIHG',
            'modelo' => 'SEIKO EPSON CORP',
            'descripcion' => 'Color blanco',
            'clave' => 'proyector-salon-01',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'cable-AVG',
            'num_serie' => '6752CFGH',
            'modelo' => 'STEREN-890',
            'descripcion' => 'cable de color Azul',
            'clave' => 'cvga-cc-01',
        ]);

        factory(Inventario::class)->create([
            'nombre' => 'cable-HDMI',
            'num_serie' => '67gigigio',
            'modelo' => 'STEREN-089',
            'descripcion' => 'cable color negro',
            'clave' => 'chdmi-cc-12',
        ]);

    }
}

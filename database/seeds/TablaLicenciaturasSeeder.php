<?php

use Illuminate\Database\Seeder;
use App\Licenciaturas;
use App\Materias;

class TablaLicenciaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $derecho =  factory(Licenciaturas::class)->create([
            'nombre' => 'Licenciatura en Derecho',
            'clave' => '001der']);

        $administracion = factory(Licenciaturas::class)->create([
            'nombre' => 'Licenciatura en Administración de Empresas',
            'clave' => '002adm']);

        $contaduria = factory(Licenciaturas::class)->create([
            'nombre' => 'Licenciatura en Contaduría',
            'clave' => '003con']);

        $pedagogia = factory(Licenciaturas::class)->create([
            'nombre' => 'Licenciatura en Pedagogia',
            'clave' => '004ped']);

       $comunicacion = factory(App\Licenciaturas::class)->create([
            'nombre' => 'Licenciatura en Ciencias de la Comunicación',
            'clave' => '005com']);

        $sistemas = factory(Licenciaturas::class)->create([
            'nombre' => 'Licenciatura en Sistemas Computacionales Administrativos',
            'clave' => '006sis']);

       factory(Materias::class)->create([
            'nombre' => 'Introducción al Estudio del Derecho',
            'clave' => 'Der0101']);

        factory(Materias::class)->create([
            'nombre' => 'Derecho Romano I',
            'clave' => 'Der0102']);

        factory(Materias::class)->create([
            'nombre' => 'Historia del Derecho Mexicano',
            'clave' => 'Der0103']);

        factory(Materias::class)->create([
            'nombre' => 'Informática Básica',
            'clave' => 'Der0104']);

        factory(Materias::class)->create([
            'nombre' => 'Teoría Política',
            'clave' => 'Der0105']);

        factory(Materias::class)->create([
            'nombre' => 'Expresión Oral y Escrita',
            'clave' => 'Der0106']);
        factory(Materias::class)->create([
            'nombre' => 'Introducción al Estudio del Derecho',
            'clave' => 'Der0101']);

        factory(Materias::class)->create([
            'nombre' => 'Derecho Romano I',
            'clave' => 'Der0102']);

        factory(Materias::class)->create([
            'nombre' => 'Historia del Derecho Mexicano',
            'clave' => 'Der0103']);

        factory(Materias::class)->create([
            'nombre' => 'Informática Básica',
            'clave' => 'Der0104']);

        factory(Materias::class)->create([
            'nombre' => 'Teoría Política',
            'clave' => 'Der0105']);

        factory(Materias::class)->create([
            'nombre' => 'Expresión Oral y Escrita',
            'clave' => 'Der0106']);


        $materias = App\Materias::all();

        $derecho->materias()->save($materias[0]);

        $administracion->materias()->save($materias[1]);

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Licenciatura;

class TablaLicenciaturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //--Crea las licenciaturas y les asigna materias

        $licenciatura_derecho = new App\Licenciatura([
            'nombre' => 'Licenciatura en Derecho',
            'clave' => '001der'
        ]);

        $licenciatura_derecho->save();

        $licenciatura_derecho->materias()->saveMany([
            new App\Materia([
                'nombre' => 'Introducción al Estudio del Derecho',
                'clave' => 'Der0101'
            ]),
            new App\Materia([
                'nombre' => 'Derecho Romano I',
                'clave' => 'Der0102'
            ]),
        ]);

        $licenciatura_administracion = new App\Licenciatura([
            'nombre' => 'Licenciatura en Administración de Empresas',
            'clave' => '002adm'
        ]);

        $licenciatura_administracion->save();

        $licenciatura_administracion->materias()->saveMany([
            new App\Materia([
                'nombre' => 'Introducción al Estudio de la Administración',
                'clave' => 'Admin0101'
            ]),
            new App\Materia([
                'nombre' => 'Administración I',
                'clave' => 'Admin0102'
            ]),
        ]);

        $licenciatura_contaduria = new App\Licenciatura([
            'nombre' => 'Licenciatura en Contaduría',
            'clave' => '003con'
        ]);

        $licenciatura_contaduria->save();

        $licenciatura_contaduria->materias()->saveMany([
            new App\Materia([
                'nombre' => 'Introducción al Estudio de la Contaduría',
                'clave' => 'Cont0101'
            ]),
            new App\Materia([
                'nombre' => 'Contaduría I',
                'clave' => 'Cont0102'
            ]),
        ]);

        $licenciatura_pedagogia = new App\Licenciatura([
            'nombre' => 'Licenciatura en Pedagogia',
            'clave' => '004ped'
        ]);

        $licenciatura_pedagogia->save();

        $licenciatura_pedagogia->materias()->saveMany([
            new App\Materia([
                'nombre' => 'Introducción al Estudio de la Pedagogia',
                'clave' => 'Ped0101'
            ]),
            new App\Materia([
                'nombre' => 'Pedagogia I',
                'clave' => 'Ped0102'
            ]),
        ]);

        $licenciatura_comunicacion = new App\Licenciatura([
            'nombre' => 'Licenciatura en Ciencias de la Comunicación',
            'clave' => '005com'
        ]);

        $licenciatura_comunicacion->save();

        $licenciatura_comunicacion->materias()->saveMany([
            new App\Materia([
                'nombre' => 'Introducción al Estudio de la Comunicación',
                'clave' => 'Com0101'
            ]),
            new App\Materia([
                'nombre' => 'Comunicación I',
                'clave' => 'Com0102'
            ]),
        ]);

        $licenciatura_sistemas = new App\Licenciatura([
            'nombre' => 'Licenciatura en Sistemas Computacionales Administrativos',
            'clave' => '006sis'
        ]);

        $licenciatura_sistemas->save();

        $licenciatura_sistemas->materias()->saveMany([
            new App\Materia([
                'nombre' => 'Introducción al Estudio de Sistemas',
                'clave' => 'Sis0101'
            ]),
            new App\Materia([
                'nombre' => 'Fundamentos de Ingeniería de Sofware',
                'clave' => 'Sis0102'
            ]),
        ]);
    }
}

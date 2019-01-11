<?php

use Illuminate\Database\Seeder;
use \App\Materia;
use \App\Libro;

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
                'clave' => 'Der0101',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Derecho Romano I',
                'clave' => 'Der0102',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Derecho Civil',
                'clave' => 'Der0201',
                'cuatrimestre' => 2
            ]),
            new App\Materia([
                'nombre' => 'Derecho Penal',
                'clave' => 'Der0202',
                'cuatrimestre' => 2
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
                'clave' => 'Admin0101',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Administración I',
                'clave' => 'Admin0102',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Tópicos de Recursos Humanos',
                'clave' => 'Admin0201',
                'cuatrimestre' => 2
            ]),
            new App\Materia([
                'nombre' => 'Derecho Mercantil',
                'clave' => 'Admin0202',
                'cuatrimestre' => 2
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
                'clave' => 'Cont0101',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Contaduría I',
                'clave' => 'Cont0102',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Auditoria para Contadores',
                'clave' => 'Cont0201',
                'cuatrimestre' => 2
            ]),
            new App\Materia([
                'nombre' => 'Matematicas II',
                'clave' => 'Cont0202',
                'cuatrimestre' => 2
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
                'clave' => 'Ped0101',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Pedagogia I',
                'clave' => 'Ped0102',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Pedagogía II',
                'clave' => 'Ped0201',
                'cuatrimestre' => 2
            ]),
            new App\Materia([
                'nombre' => 'Tópicos de enseñanza docente',
                'clave' => 'Ped0202',
                'cuatrimestre' => 2
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
                'clave' => 'Com0101',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Comunicación I',
                'clave' => 'Com0102',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Comunicación II',
                'clave' => 'Com0201',
                'cuatrimestre' => 2
            ]),
            new App\Materia([
                'nombre' => 'Tópicos de Lenguaje',
                'clave' => 'Com0202',
                'cuatrimestre' => 2
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
                'clave' => 'Sis0101',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Fundamentos de Ingeniería de Sofware',
                'clave' => 'Sis0102',
                'cuatrimestre' => 1
            ]),
            new App\Materia([
                'nombre' => 'Cálculo Integral',
                'clave' => 'Sis0201',
                'cuatrimestre' => 2
            ]),
            new App\Materia([
                'nombre' => 'Programación Orientada a Objetos',
                'clave' => 'Sis0202',
                'cuatrimestre' => 2
            ]),
        ]);

        //Asignacion de Libros a materias

                                //Casteo la consulta de una materia a un modelo de Materia
        //$int_estudio_derecho = $licenciatura_derecho->materias()->find(1);

        $collection = Materia::where('nombre', "Introducción al Estudio del Derecho")->first();

        dd($collection);
        //$libro1 = Libro::find(2);
        //$libro2 = Libro::find(2);
        //$int_estudio_derecho->libros()->saveMany([$libro1, $libro2]);
        /*
        $derecho_romano = Materia::where('nombre', 'Derecho Romano I')->first();
        $derecho_romano->libros()->saveMany([
            new Libro(Libro::find(3)),
            new Libro(Libro::find(4))
        ]);*/


    }
}

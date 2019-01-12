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

        $materia_introduccion_estudio_derecho = new Materia([
            'nombre' => 'Introducción al Estudio del Derecho',
            'clave' => 'Der0101',
            'cuatrimestre' => 1
        ]);
        $materia_derecho_romano = new Materia([
                'nombre' => 'Derecho Romano I',
                'clave' => 'Der0102',
                'cuatrimestre' => 1
        ]);
        $materia_derecho_civil = new Materia([
                'nombre' => 'Derecho Civil',
                'clave' => 'Der0201',
                'cuatrimestre' => 2
        ]);
        $materia_derecho_penal = new Materia([
                'nombre' => 'Derecho Penal',
                'clave' => 'Der0202',
                'cuatrimestre' => 2
        ]);

        $licenciatura_derecho->materias()->saveMany([
            $materia_introduccion_estudio_derecho,
            $materia_derecho_romano,
            $materia_derecho_civil,
            $materia_derecho_penal
        ]);

        $licenciatura_administracion = new App\Licenciatura([
            'nombre' => 'Licenciatura en Administración de Empresas',
            'clave' => '002adm'
        ]);

        $licenciatura_administracion->save();

        $materia_introduccion_estudio_administracion =  new Materia([
            'nombre' => 'Introducción al Estudio de la Administración',
            'clave' => 'Admin0101',
            'cuatrimestre' => 1
        ]);
        $materia_administracion_uno = new Materia([
                'nombre' => 'Administración I',
                'clave' => 'Admin0102',
                'cuatrimestre' => 1
        ]);
        $materia_topicos_recursos_humanos = new Materia([
                'nombre' => 'Tópicos de Recursos Humanos',
                'clave' => 'Admin0201',
                'cuatrimestre' => 2
        ]);
        $materia_derecho_mercantil = new Materia([
                'nombre' => 'Derecho Mercantil',
                'clave' => 'Admin0202',
                'cuatrimestre' => 2
        ]);

        $licenciatura_administracion->materias()->saveMany([
            $materia_introduccion_estudio_administracion,
            $materia_administracion_uno,
            $materia_topicos_recursos_humanos,
            $materia_derecho_mercantil
        ]);

        $licenciatura_contaduria = new App\Licenciatura([
            'nombre' => 'Licenciatura en Contaduría',
            'clave' => '003con'
        ]);

        $licenciatura_contaduria->save();

        $materia_introduccion_estudio_contaduria = new Materia([
            'nombre' => 'Introducción al Estudio de la Contaduría',
            'clave' => 'Cont0101',
            'cuatrimestre' => 1
        ]);
        $materia_contaduria_uno = new Materia([
                'nombre' => 'Contaduría I',
                'clave' => 'Cont0102',
                'cuatrimestre' => 1
        ]);
        $materia_auditoria_contadores = new Materia([
                'nombre' => 'Auditoria para Contadores',
                'clave' => 'Cont0201',
                'cuatrimestre' => 2
        ]);
        $materia_matematicas_dos = new Materia([
                'nombre' => 'Matematicas II',
                'clave' => 'Cont0202',
                'cuatrimestre' => 2
        ]);

        $licenciatura_contaduria->materias()->saveMany([
            $materia_introduccion_estudio_contaduria,
            $materia_contaduria_uno,
            $materia_auditoria_contadores,
            $materia_matematicas_dos
        ]);

        $licenciatura_pedagogia = new App\Licenciatura([
            'nombre' => 'Licenciatura en Pedagogia',
            'clave' => '004ped'
        ]);

        $licenciatura_pedagogia->save();

        $materia_introduccion_estudio_pedagogia = new Materia([
            'nombre' => 'Introducción al Estudio de la Pedagogia',
            'clave' => 'Ped0101',
            'cuatrimestre' => 1
        ]);
        $materia_pedagogia_uno = new Materia([
                'nombre' => 'Pedagogia I',
                'clave' => 'Ped0102',
                'cuatrimestre' => 1
        ]);
        $materia_pedagogia_dos = new Materia([
                'nombre' => 'Pedagogía II',
                'clave' => 'Ped0201',
                'cuatrimestre' => 2
        ]);
        $materia_topicos_enseñanza_docente = new Materia([
                'nombre' => 'Tópicos de enseñanza docente',
                'clave' => 'Ped0202',
                'cuatrimestre' => 2
        ]);

        $licenciatura_pedagogia->materias()->saveMany([
            $materia_introduccion_estudio_pedagogia,
            $materia_pedagogia_uno,
            $materia_pedagogia_dos,
            $materia_topicos_enseñanza_docente
        ]);

        $licenciatura_comunicacion = new App\Licenciatura([
            'nombre' => 'Licenciatura en Ciencias de la Comunicación',
            'clave' => '005com'
        ]);

        $licenciatura_comunicacion->save();

        $materia_introduccion_estudio_comunicacion = new Materia([
            'nombre' => 'Introducción al Estudio de la Comunicación',
            'clave' => 'Com0101',
            'cuatrimestre' => 1
        ]);
        $materia_comunicacion_uno = new Materia([
                'nombre' => 'Comunicación I',
                'clave' => 'Com0102',
                'cuatrimestre' => 1
        ]);
        $materia_comunicacion_dos = new Materia([
                'nombre' => 'Comunicación II',
                'clave' => 'Com0201',
                'cuatrimestre' => 2
        ]);
        $materia_topicos_lenguaje = new Materia([
                'nombre' => 'Tópicos de Lenguaje',
                'clave' => 'Com0202',
                'cuatrimestre' => 2
        ]);

        $licenciatura_comunicacion->materias()->saveMany([
            $materia_introduccion_estudio_comunicacion,
            $materia_comunicacion_uno,
            $materia_comunicacion_dos,
            $materia_topicos_lenguaje
        ]);

        $licenciatura_sistemas = new App\Licenciatura([
            'nombre' => 'Licenciatura en Sistemas Computacionales Administrativos',
            'clave' => '006sis'
        ]);

        $licenciatura_sistemas->save();

        $materia_introduccion_estudio_sistemas = new Materia([
            'nombre' => 'Introducción al Estudio de Sistemas',
            'clave' => 'Sis0101',
            'cuatrimestre' => 1
        ]);
        $materia_fundamentos_software = new Materia([
                'nombre' => 'Fundamentos de Ingeniería de Sofware',
                'clave' => 'Sis0102',
                'cuatrimestre' => 1
        ]);
        $materia_calculo_integral = new Materia([
                'nombre' => 'Cálculo Integral',
                'clave' => 'Sis0201',
                'cuatrimestre' => 2
        ]);
        $materia_programacion_objetos = new Materia([
                'nombre' => 'Programación Orientada a Objetos',
                'clave' => 'Sis0202',
                'cuatrimestre' => 2
        ]);

        $licenciatura_sistemas->materias()->saveMany([
            $materia_introduccion_estudio_sistemas,
            $materia_fundamentos_software,
            $materia_calculo_integral,
            $materia_programacion_objetos
        ]);
        //Asignacion de Libros a materias
                                //Casteo la consulta de una materia a un modelo de Materia
        $materia_introduccion_estudio_derecho->libros()->saveMany([
            factory(App\Libro::class)->make(),
            factory(App\Libro::class)->make()
        ]);

        $materia_derecho_romano->libros()->saveMany([
            factory(App\Libro::class)->make(),
            factory(App\Libro::class)->make()
        ]);

        $materia_derecho_civil->libros()->saveMany([
            factory(App\Libro::class)->make(),
            factory(App\Libro::class)->make()
        ]);

        $materia_derecho_penal->libros()->saveMany([
            factory(App\Libro::class)->make(),
            factory(App\Libro::class)->make()
        ]);


    }
}

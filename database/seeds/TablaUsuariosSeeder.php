<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class TablaUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crea 10 usuarios
        factory(App\User::class, 10)->create();

        //Crea el rol SuperAdministrador
        Role::create([
            'name'              => 'SuperAdmin',
            'slug'              => 'superadmin',
            'description'       => 'Puede acceder a todos los componentes del Sistema',
            'special'           => 'all-access'
        ]);

        //Crea el rol Encargado de Biblioteca
        Role::create([
            'name'              => 'EncargadoBiblioteca',
            'slug'              => 'encargadobiblioteca',
            'description'       => 'Puede manipular todas las acciones con respecto a la biblioteca'
        ]);

        //Crea el rol Alumno
        Role::create([
            'name'              => 'Alumno',
            'slug'              => 'alumno',
            'description'       => 'Puede acceder solo a información básica de libros'
        ]);
    }
}

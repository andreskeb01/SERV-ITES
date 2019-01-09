<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class TablaPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos de usuarios del Sistema
        Permission::create([
            'name'        => 'Navegar usuarios del Sistema',
            'slug'        => 'usuarios.index',
            'description' => 'Lista y navega todos los usuarios del Sistema',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de usuarios del Sistema',
            'slug'        => 'usuarios.show',
            'description' => 'Ver en detalle todos los usuarios del Sistema',
        ]);
        Permission::create([
            'name'        => 'Edicion de usuarios del Sistema',
            'slug'        => 'usuarios.edit',
            'description' => 'Editar cualquier dato de un usuario del Sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar usuarios del Sistema',
            'slug'        => 'usuarios.delete',
            'description' => 'Eliminar cualquier usuario del Sistema',
        ]);

        //Roles de usuarios del Sistema
        Permission::create([
            'name'        => 'Navegar roles del Sistema',
            'slug'        => 'roles.index',
            'description' => 'Lista y navega todos los roles del Sistema',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de roles del Sistema',
            'slug'        => 'roles.show',
            'description' => 'Ver en detalle todos los roles del Sistema',
        ]);
        Permission::create([
            'name'        => 'Creacion de roles del Sistema',
            'slug'        => 'roles.create',
            'description' => 'Crear un rol en el Sistema',
        ]);
        Permission::create([
            'name'        => 'Edicion de roles del Sistema',
            'slug'        => 'roles.edit',
            'description' => 'Editar cualquier dato de un rol en el Sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar roles del Sistema',
            'slug'        => 'roles.delete',
            'description' => 'Eliminar cualquier rol del Sistema',
        ]);

        //Permisos para alumnos del módulo Biblioteca
        Permission::create([
            'name'        => 'Navegar libros',
            'slug'        => 'libros.index',
            'description' => 'Lista y navega todos los libros',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de libros',
            'slug'        => 'libros.show',
            'description' => 'Ver en detalle todos los libros',
        ]);
        Permission::create([
            'name'        => 'Creacion de libros',
            'slug'        => 'libros.create',
            'description' => 'Crear un libro',
        ]);
        Permission::create([
            'name'        => 'Edicion de libros',
            'slug'        => 'libros.edit',
            'description' => 'Editar cualquier dato de un libro',
        ]);
        Permission::create([
            'name'        => 'Eliminar libros',
            'slug'        => 'libros.delete',
            'description' => 'Eliminar cualquier libro',
        ]);


    }
}

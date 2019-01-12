<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use App\User;

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
        $permiso_usuarios_index = Permission::create([
            'name'        => 'Navegar usuarios del Sistema',
            'slug'        => 'usuarios.index',
            'description' => 'Lista y navega todos los usuarios del Sistema',
        ]);
        $permiso_usuarios_show = Permission::create([
            'name'        => 'Ver detalle de usuarios del Sistema',
            'slug'        => 'usuarios.show',
            'description' => 'Ver en detalle todos los usuarios del Sistema',
        ]);
        $permiso_usuarios_edit =Permission::create([
            'name'        => 'Edicion de usuarios del Sistema',
            'slug'        => 'usuarios.edit',
            'description' => 'Editar cualquier dato de un usuario del Sistema',
        ]);
        $permiso_usuarios_delete = Permission::create([
            'name'        => 'Eliminar usuarios del Sistema',
            'slug'        => 'usuarios.delete',
            'description' => 'Eliminar cualquier usuario del Sistema',
        ]);

        //Roles de usuarios del Sistema
        $permiso_roles_index = Permission::create([
            'name'        => 'Navegar roles del Sistema',
            'slug'        => 'roles.index',
            'description' => 'Lista y navega todos los roles del Sistema',
        ]);
        $permiso_roles_show = Permission::create([
            'name'        => 'Ver detalle de roles del Sistema',
            'slug'        => 'roles.show',
            'description' => 'Ver en detalle todos los roles del Sistema',
        ]);
        $permiso_roles_create = Permission::create([
            'name'        => 'Creacion de roles del Sistema',
            'slug'        => 'roles.create',
            'description' => 'Crear un rol en el Sistema',
        ]);
        $permiso_roles_edit = Permission::create([
            'name'        => 'Edicion de roles del Sistema',
            'slug'        => 'roles.edit',
            'description' => 'Editar cualquier dato de un rol en el Sistema',
        ]);
        $permiso_roles_delete = Permission::create([
            'name'        => 'Eliminar roles del Sistema',
            'slug'        => 'roles.delete',
            'description' => 'Eliminar cualquier rol del Sistema',
        ]);

        //Permisos para el módulo Biblioteca
        $permiso_biblioteca_index = Permission::create([
            'name'        => 'Navegar libros',
            'slug'        => 'libros.index',
            'description' => 'Lista y navega todos los libros',
        ]);
        $permiso_biblioteca_show = Permission::create([
            'name'        => 'Ver detalle de libros',
            'slug'        => 'libros.show',
            'description' => 'Ver en detalle todos los libros',
        ]);
        $permiso_biblioteca_create = Permission::create([
            'name'        => 'Creacion de libros',
            'slug'        => 'libros.create',
            'description' => 'Crear un libro',
        ]);
        $permiso_biblioteca_edit = Permission::create([
            'name'        => 'Edicion de libros',
            'slug'        => 'libros.edit',
            'description' => 'Editar cualquier dato de un libro',
        ]);
        $permiso_biblioteca_delete = Permission::create([
            'name'        => 'Eliminar libros',
            'slug'        => 'libros.delete',
            'description' => 'Eliminar cualquier libro',
        ]);

        //----Crea los roles del SERVITES---//

        //Crea el rol SuperAdministrador
        $rol_admin = Role::create([
            'name'              => 'SuperAdmin',
            'slug'              => 'superadmin',
            'description'       => 'Puede acceder a todos los componentes del Sistema',
            'special'           => 'all-access'
        ]);

        //Crea el rol Encargado de Biblioteca
        $rol_encargado_biblioteca = Role::create([
            'name'              => 'EncargadoBiblioteca',
            'slug'              => 'encargadobiblioteca',
            'description'       => 'Puede manipular todas las acciones con respecto a la biblioteca'
        ]);

        //Crea el rol Alumno
        $rol_alumno = Role::create([
            'name'              => 'Alumno',
            'slug'              => 'alumno',
            'description'       => 'Puede acceder solo a información básica de libros'
        ]);

        //Crea el rol Encargado de Centro de Computo
        $rol_encargado_cc = Role::create([
            'name'              => 'EncargadoCC',
            'slug'              => 'encargadocc',
            'description'       => 'Puede manipular todas las acciones con respecto al centro de computo'
        ]);

        //Crea el rol Docente
        $rol_docente = Role::create([
            'name'              => 'Docente',
            'slug'              => 'docente',
            'description'       => 'Puede acceder solo a información básica de inventario'
        ]);

        $permiso_licenciatura_index = Permission::create([
            'name'=>'Navegar Licenciaturas',
            'slug'        => 'licenciaturas.index',
            'description' => 'Navega y lista todas las licenciaturas',
        ]);

        $permiso_licenciatura_show = Permission::create([
            'name'        => 'Ver detalle de licenciaturas',
            'slug'        => 'licenciaturas.show',
            'description' => 'Ver en detalle todas las licenciaturas',
        ]);
        $permiso_licenciatura_create = Permission::create([
            'name'        => 'Creacion de licenciaturas',
            'slug'        => 'licenciaturas.create',
            'description' => 'Crear una licenciatura',
        ]);
        $permiso_licenciatura_edit = Permission::create([
            'name'        => 'Edicion de licenciaturas',
            'slug'        => 'licenciaturas.edit',
            'description' => 'Editar cualquier dato de una licenciatura',
        ]);
        $permiso_licenciatura_delete = Permission::create([
            'name'        => 'Eliminar licenciaturas',
            'slug'        => 'licenciaturas.delete',
            'description' => 'Eliminar cualquier licenciatura',
        ]);

        //---Relaciones de Permisos y roles---

        //Permisos para el rol encargadobiblioteca
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_index);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_show);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_create);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_edit);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_delete);

        $rol_encargado_biblioteca->assignPermission($permiso_licenciatura_index);
        $rol_encargado_biblioteca->assignPermission($permiso_licenciatura_show);
        $rol_encargado_biblioteca->assignPermission($permiso_licenciatura_create);
        $rol_encargado_biblioteca->assignPermission($permiso_licenciatura_edit);
        $rol_encargado_biblioteca->assignPermission($permiso_licenciatura_delete);

        //Permisos para el rol alumno
        $rol_alumno->assignPermission($permiso_biblioteca_index);
        $rol_alumno->assignPermission($permiso_biblioteca_show);

        //--Asignacion de roles a usuarios

        //Rol de encargado de biblioteca
        $usuario_encargado_biblioteca = factory(User::class)->create([
            'name' => 'Encargado Biblioteca',
            'email' => 'andreskeb01@gmail.com',
            'password' => bcrypt('biblioteca')
        ]);

        $usuario_encargado_biblioteca->roles()->attach($rol_encargado_biblioteca);

        //Rol de superaministrador
        $usuario_superadmin = factory(User::class)->create([
            'name' => 'Super Administrador',
            'email' => 'egabriel.polanco@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $usuario_superadmin->roles()->attach($rol_admin);

    }
}

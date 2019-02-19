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
//--------------------------------
        $permiso_biblioteca_materia_index = Permission::create([
            'name'        => 'Navegar materias',
            'slug'        => 'materias.index',
            'description' => 'Lista y navega todas las materias',
        ]);
        $permiso_biblioteca_materia_show = Permission::create([
            'name'        => 'Ver detalle de materias',
            'slug'        => 'materias.show',
            'description' => 'Ver en detalle todas las materias',
        ]);
        $permiso_biblioteca_materia_create = Permission::create([
            'name'        => 'Creacion de materias',
            'slug'        => 'materias.create',
            'description' => 'Crear una materia',
        ]);
        $permiso_biblioteca_materia_edit = Permission::create([
            'name'        => 'Edicion de materias',
            'slug'        => 'materias.edit',
            'description' => 'Editar cualquier dato de una materia',
        ]);
        $permiso_biblioteca_materia_delete = Permission::create([
            'name'        => 'Eliminar materias',
            'slug'        => 'materias.delete',
            'description' => 'Eliminar cualquier materia',
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


        //****************************************************************************************************
        //Permisos de centro de computo
        $permiso_cc_index = Permission::create([
            'name'        => 'Navegar inventario',
            'slug'        => 'inventario.index',
            'description' => 'Lista y navega todos los equipos',
        ]);
        $permiso_cc_show = Permission::create([
            'name'        => 'Ver detalle de equipo o dispositivo',
            'slug'        => 'inventario.show',
            'description' => 'Ver en detalle los equipos',
        ]);
        $permiso_cc_create = Permission::create([
            'name'        => 'Creacion de equipos y dispositivos',
            'slug'        => 'inventario.create',
            'description' => 'Crear un equipo o dispositivo',
        ]);
        $permiso_cc_edit = Permission::create([
            'name'        => 'Edicion de equipo o dispositivo',
            'slug'        => 'inventario.edit',
            'description' => 'Editar cualquier dato de equipos',
        ]);
        $permiso_cc_delete = Permission::create([
            'name'        => 'Eliminar equipo o dispositivos',
            'slug'        => 'inventario.delete',
            'description' => 'Eliminar cualquier dispositivo del inventario',
        ]);

        //***********************************************************************************************************
        //Crea el rol Encargado de Centro de Computo
        $rol_encargado_cc = Role::create([
            'name'              => 'EncargadoCC',
            'slug'              => 'encargadocc',
            'description'       => 'Puede manipular todas las acciones con respecto al centro de computo'
        ]);

        //***************************************************************************************************
        //Crea el rol Docente
        $rol_docente = Role::create([
            'name'              => 'Docente',
            'slug'              => 'docente',
            'description'       => 'Puede acceder solo a información básica de inventario'
        ]);


        //***********************************************************************************************************

       //Rol  de permisos de encargado de computo
        $rol_encargado_cc->assignPermission($permiso_cc_index);
        $rol_encargado_cc->assignPermission($permiso_cc_show);
        $rol_encargado_cc->assignPermission($permiso_cc_create);
        $rol_encargado_cc->assignPermission($permiso_cc_edit);
        $rol_encargado_cc->assignPermission($permiso_cc_delete);
        //***********************************************************************************************************


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

        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_materia_index);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_materia_show);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_materia_create);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_materia_edit);
        $rol_encargado_biblioteca->assignPermission($permiso_biblioteca_materia_delete);

        //Permisos para el rol alumno
        $rol_alumno->assignPermission($permiso_licenciatura_index);
        $rol_alumno->assignPermission($permiso_biblioteca_show);

        //--Asignacion de roles a usuarios

        //Rol de superaministrador
        $usuario_encargado_computo = factory(User::class)->create([
            'name' => 'Encargado de Cómputo',
            'email' => '13470522@itcampeche.edu.mx',
            'password' => bcrypt('centrocomputo')
        ]);

        $usuario_encargado_computo->roles()->attach($rol_encargado_cc);

        //Rol de encargado de biblioteca
        $usuario_encargado_biblioteca = factory(User::class)->create([
            'name' => 'Encargado Biblioteca',
            'email' => 'andreskeb01@gmail.com',
            'password' => bcrypt('biblioteca')
        ]);



        //Rol de un usuario alumno
        $usuario_alumno_biblioteca = factory(User::class)->create([
            'name' => 'Alumno ITES',
            'email' => 'alumnoRD@gmail.com',
            'password' => bcrypt('biblioteca')
        ]);

        $usuario_encargado_biblioteca->roles()->attach($rol_encargado_biblioteca);
        $usuario_alumno_biblioteca->roles()->attach($rol_alumno);

        //Rol de superaministrador
        $usuario_superadmin = factory(User::class)->create([
            'name' => 'Super Administrador',
            'email' => 'egabriel.polanco@gmail.com',
            'password' => bcrypt('admin')
        ]);

        $usuario_superadmin->roles()->attach($rol_admin);

        //***********************************************************************************************************
        //Rol  de permiso a docente
        $rol_docente->assignPermission($permiso_cc_index);
        $rol_docente->assignPermission($permiso_cc_show);

        //Usuario docente
        $usuario_docente_01 = factory(User::class)->create([
            'name' => 'Miguel González',
            'email' => 'mgonzales@gmail.com',
            'password' => bcrypt('docente')
        ]);
        //Usuario docente
        $usuario_docente_02 = factory(User::class)->create([
            'name' => 'Ana Martínez',
            'email' => 'amartinez@gmail.com',
            'password' => bcrypt('docente')
        ]);

        $usuario_docente_01->roles()->attach($rol_docente);
        $usuario_docente_02->roles()->attach($rol_docente);

    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Auth', 'prefix' => '' ], function ()
{
    Route::get('/login', 'LoginController@showLoginForm')->name('login_index');
    Route::post('/login', 'LoginController@autenticar')->name('login_autenticar');
    Route::post('/logout', 'LoginController@cerrarSesion')->name('cerrar_sesion');

    Route::get('/logincomputo', 'LoginComputoController@showLoginComputoForm')->name('login_computo_index');
    Route::post('/logincomputo', 'LoginComputoController@autenticar')->name('login_computo_autenticar');
    Route::post('/computologout', 'LoginComputoController@cerrarSesion')->name('computo_cerrar_sesion');

    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@register')->name('register.create');

});

Route::get ('/biblioteca', 'DashboardBiblioteca\DashboardController@index')->name('biblioteca');
Route::get ('/biblioteca/administrar', 'DashboardBiblioteca\DashboardController@administrar')->name('biblioteca.administrar');
Route::get ('/centrocomputo', 'DashboardCentroComputo\DashboardController@index')->name('centrocomputo');

//Rutas con el middleware Permisos
Route::middleware(['auth'])->group(function () {

    //Roles (Solo son visibles para SuperAdministrador)
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::delete('roles/{role}', 'RoleController@delete')->name('roles.delete')->middleware('permission:roles.delete');

    //Permisos para SuperAdministrador
    Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index')->middleware('permission:usuarios.index');
    Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store')->middleware('permission:usuarios.create');
    Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create')->middleware('permission:usuarios.create');
    Route::get('usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show')->middleware('permission:usuarios.show');
    Route::get('usuarios/{usuario}/edit', 'UsuarioController@edit')->name('usuarios.edit')->middleware('permission:usuarios.edit');
    Route::put('usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update')->middleware('permission:usuarios.edit');
    Route::delete('usuarios/{usuario}', 'UsuarioController@delete')->name('usuarios.delete')->middleware('permission:usuarios.delete');

    //Permisos para Usuarios de Biblioteca
    Route::get('libros', 'LibroController@index')->name('libros.index')->middleware('permission:libros.index');

    //Permisos para Encargado de Biblioteca
    Route::get('libros/create', 'LibroController@create')->name('libros.create')->middleware('permission:libros.create');
    Route::post('libros/store', 'LibroController@store')->name('libros.store')->middleware('permission:libros.create');
    Route::get('libros/{libro}', 'LibroController@show')->name('libros.show')->middleware('permission:libros.show');
    Route::get('libros/{libro}/edit', 'LibroController@edit')->name('libros.edit')->middleware('permission:libros.edit');
    Route::put('libros/update', 'LibroController@update')->name('libros.update')->middleware('permission:libros.edit');
    Route::delete('libros/{libro}', 'LibroController@destroy')->name('libros.delete')->middleware('permission:libros.delete');

    //Permisos para Licenciaturas
    Route::get('licenciaturas', 'LicenciaturaController@index')->name('licenciaturas.index')->middleware('permission:licenciaturas.index');
    Route::post('licenciaturas/store', 'LicenciaturaController@store')->name('licenciaturas.store')->middleware('permission:licenciaturas.create');
    Route::get('licenciaturas/create', 'LicenciaturaController@create')->name('licenciaturas.create')->middleware('permission:licenciaturas.create');
    Route::get('licenciaturas/{licenciatura}', 'LicenciaturaController@show')->name('licenciaturas.show')->middleware('permission:licenciaturas.show');
    Route::get('licenciaturas/{licenciatura}/edit', 'LicenciaturaController@edit')->name('licenciaturas.edit')->middleware('permission:licenciaturas.edit');
    Route::put('licenciaturas/{licenciatura}', 'LicenciaturaController@update')->name('licenciaturas.update')->middleware('permission:licenciaturas.edit');
    Route::delete('licenciaturas/{licenciatura}', 'LicenciaturaController@delete')->name('licenciaturas.delete')->middleware('permission:licenciaturas.delete');
    //Obtiene una licenciatura por su id proporcionado
    Route::get('licenciatura/{id}', 'LicenciaturaController@licenciaturaById')->name('licenciaturaById.get');

    //Permisos para materias
    Route::get('materias/{licenciatura}', 'MateriaController@index')->name('materias.index');
    //Obtiene materias segun el cuatrimestre proporcionado
    Route::get('materia/{cuatrimestre}/{licenciaturaId}', 'MateriaController@materiasByCuatrimestre')->name('materiasByCuatrimestre.get');
    Route::get('materia/create', 'MateriaController@create')->name('materias.create')->middleware('permission:materias.create');
    Route::post('materia/store', 'MateriaController@store')->name('materias.store')->middleware('permission:materias.create');

    //***************************************************************************************************************************************************************
    //Rutas de centro de computo
    Route::get('inventario', 'InventarioController@index')->name('inventario.index')->middleware('permission:inventario.index');
    Route::get('inventario/create', 'InventarioController@create')->name('inventario.create')->middleware('permission:inventario.create');
    Route::post('inventario/store', 'InventarioController@store')->name('inventario.store')->middleware('permission:inventario.create');
    Route::get('inventario/{equipo}', 'InventarioController@show')->name('inventario.show')->middleware('permission:inventario.show');
    Route::get('inventario/{equipo}/edit', 'InventarioController@edit')->name('inventario.edit')->middleware('permission:inventario.edit');
    Route::put('inventario/{equipo}', 'InventarioController@update')->name('inventario.update')->middleware('permission:inventario.edit');
    Route::delete('inventario/{equipo}', 'InventarioController@delete')->name('inventario.delete')->middleware('permission:inventario.delete');

});



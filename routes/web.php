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
});

Route::get ('/biblioteca', 'DashboardBiblioteca\DashboardController@index')->name('biblioteca');

//Rutas con el middleware Permisos
Route::middleware(['auth'])->group(function () {

    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
    Route::delete('roles/{role}', 'RoleController@delete')->name('roles.delete')->middleware('permission:roles.delete');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');

    //Permisos para SuperAministrador
    Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store')->middleware('permission:usuarios.create');
    Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index')->middleware('permission:usuarios.index');
    Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create')->middleware('permission:usuarios.create');
    Route::put('usuarios/{usuario}', 'UsuarioController@update')->name('usuarios.update')->middleware('permission:usuarios.edit');
    Route::get('usuarios/{usuario}', 'UsuarioController@show')->name('usuarios.show')->middleware('permission:usuarios.show');
    Route::delete('usuarios/{usuario}', 'UsuarioController@delete')->name('usuarios.delete')->middleware('permission:usuarios.delete');
    Route::get('usuarios/{usuario}/edit', 'UsuarioController@edit')->name('usuarios.edit')->middleware('permission:usuarios.edit');

    //Permisos para Usuarios de Biblioteca
    Route::post('libros/store', 'LibroController@store')->name('libros.store')->middleware('permission:libros.create');
    Route::get('libros', 'LibroController@index')->name('libros.index')->middleware('permission:libros.index');

    //Permisos para Encargado de Biblioteca
    Route::get('libros/create', 'LibroController@create')->name('libros.create')->middleware('permission:libros.create');
    Route::put('libros/{libro}', 'LibroController@update')->name('libros.update')->middleware('permission:libros.edit');
    Route::get('libros/{libro}', 'LibroController@show')->name('libros.show')->middleware('permission:libros.show');
    Route::delete('libros/{libro}', 'LibroController@delete')->name('libros.delete')->middleware('permission:libros.delete');
    Route::get('libros/{libro}/edit', 'LibroController@edit')->name('libros.edit')->middleware('permission:libros.edit');
});



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
   // Route::();
});

Route::get ('/dashboard', 'DashboardBiblioteca\DashboardController@index')->name('dashboard');

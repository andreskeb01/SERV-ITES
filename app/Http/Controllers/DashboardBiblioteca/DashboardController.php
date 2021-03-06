<?php
/**
 * Created by PhpStorm.
 * User: ANDRES
 * Date: 05/01/2019
 * Time: 02:50 PM
 */

namespace App\Http\Controllers\DashboardBiblioteca;


use App\Http\Controllers\Controller;
use App\Licenciatura;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $licenciaturas = Licenciatura::paginate(10);
        return view ('dashboard_biblioteca.dashboard', compact('licenciaturas'));
    }
    public function administrar(){
        return view ('dashboard_biblioteca.menu_administrar');
    }

    public function consulta(Licenciatura $licenciatura){
        return view( 'dashboard_biblioteca.consulta_libros', compact('licenciatura'));
    }

}

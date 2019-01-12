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
        $licenciaturas = Licenciatura::latest()->paginate(10);
        return view ('dashboard_biblioteca.dashboard', compact('licenciaturas'));
    }

}

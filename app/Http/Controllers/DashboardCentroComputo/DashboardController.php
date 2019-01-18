<?php
/**
 * Created by PhpStorm.
 * User: ANDRES
 * Date: 05/01/2019
 * Time: 02:50 PM
 */

namespace App\Http\Controllers\DashboardCentroComputo;


use App\Http\Controllers\Controller;
use App\Inventario;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $inventario = Inventario::all();
        return view ('dashboard_cc.dashboard', compact('inventario'));
    }

}

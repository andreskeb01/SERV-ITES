<?php
/**
 * Created by PhpStorm.
 * User: ANDRES
 * Date: 05/01/2019
 * Time: 02:50 PM
 */

namespace App\Http\Controllers\DashboardCentroComputo;

use App\Categoria;
use App\Http\Controllers\Controller;
use App\Inventario;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categorias = Categoria::all();
        $inventario = Inventario::all();
        return view ('dashboard_cc.dashboard', compact('inventario','categorias'));
    }

    public function tipoByCategoria($categoriaId)
    {
        $categoria = Categoria::find($categoriaId);
        $tipos = $categoria->tipos()->get();

        //Devuelvo los datos con los tipos obtenidos
        return response()->json($tipos);
    }

    public function byCategoriaTipo($categoriaId, $tipoId)
    {
        $categoria = Categoria::find($categoriaId);
        $dispositivos = null;

        if($tipoId == "null")
        {
            $dispositivos = $categoria->inventarios()->get();
            return response()->json($dispositivos);
        }else
        {
            return response()->json(["value" => $tipoId]);
        }

    }


}

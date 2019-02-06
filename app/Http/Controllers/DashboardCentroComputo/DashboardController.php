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
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $categorias = Categoria::all();
        $inventario = collect([]);
        //Usando query scopes obtenemos los dispositivos si se buscan por nombre
        $nombre = $request->get('nombre');

        //Si el nombre es diferente a una cadena vacia
        if(trim($nombre) != ""){
            $inventario = Inventario::nombre($nombre)->get();
        }

        return view ('dashboard_cc.dashboard', compact('inventario','categorias'));
    }

    //Obtiene tipos de categorias segun la categoria proporcionada
    public function tipoByCategoria($categoriaId)
    {
        $categoria = Categoria::find($categoriaId);
        $tipos = $categoria->tipos()->get();

        //Devuelvo los datos con los tipos obtenidos
        return response()->json($tipos);
    }

    //Obtiene dispositivos segun la categoria y tipo proporcionados
    public function byCategoriaTipo($categoriaId, $tipoId)
    {
        $categoria = Categoria::find($categoriaId);
        $dispositivos = null;

        //Si no hay tipo filtramos por categoria
        if($tipoId == "null")
        {
            $dispositivos = $categoria->inventarios()->get();
            return response()->json($dispositivos);
        }else
        {
            //Si hay tipo filtramos por categoria y tipo
            $dispositivos = $categoria->inventariosByTipo($tipoId)->get();
            return response()->json($dispositivos);
        }

    }

}

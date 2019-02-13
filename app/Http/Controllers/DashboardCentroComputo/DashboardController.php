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
use App\User;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categorias = Categoria::all();
        $current_time = Carbon::now()->toDateTimeString();

        return view ('dashboard_cc.dashboard', compact('categorias', 'current_time'));
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
            //Obtiene dispositivos que no esten prestados
            $dispositivos = $categoria->inventarios()->where('prestamo_id', '=', null)->get();
            return response()->json($dispositivos);
        }else
        {
            //Si hay tipo filtramos por categoria y tipo
            //Obtiene dispositivos que no esten prestados
            $dispositivos = $categoria->inventariosByTipo($tipoId)->where('prestamo_id', '=', null)->get();
            return response()->json($dispositivos);
        }

    }

    public function dispositivosByNombre($nombre){

        $dispositivos = collect([]);

        //Busca los equipos con el nombre proporcionado

        //Si el nombre es diferente a una cadena vacia
        //Se consulta a traves del scopeNombre
        if(trim($nombre) != "") {
            $dispositivos = Inventario::nombre($nombre)->where('prestamo_id', '=', null)->get();
        }
        return response()->json($dispositivos);
    }

    public function docentesByNombre($nombre){

        $docentes = collect([]);

        //Busca los usuarios con el nombre proporcionado
        //y los filtra con los usuarios que tengan el rol_id = 5 (Rol Docente)
        //ademas de que ese usuario no tenga ningun prestamo (prestamo_id = null)

        //Si el nombre es diferente a una cadena vacia
        if(trim($nombre) != "") {
            $docentes = User::where('name', 'like', "%$nombre%")
                ->where('prestamo_id', '=', null)
                ->join('role_user', 'users.id', '=', 'role_user.user_id')
                ->where('role_id', '=', 5)
                ->get();
        }
        return response()->json($docentes);
    }

}

<?php

namespace App\Http\Controllers\Computo;


use Illuminate\Http\Request;
use App\Prestamo;
use App\Inventario;
use App\User;
use App\Http\Controllers\Controller;

class PrestamoController extends Controller
{
    public function index(){

        $prestamos = Prestamo::relaciones('usuario', 'dispositivos')->paginate(20);

        return view('prestamos.index', compact('prestamos'));
    }

    public function create(){

    }

    //Crea un prestamo con un usuario varios dispositivos
    //y una fecha y hora inicial inicial de creacion (created_at = fecha y hora del prestamo)
    public function store(Request $request){

        $dispositivos = $request->request->get("dispositivos");
        $user = $request->request->get("user");
        $total = $request->request->get("total");

        $prestamo = new Prestamo(['total' => $total]);
        $prestamo->save();

        $user = User::find($user["id"]);
        $prestamo->usuario()->save($user);

        foreach($dispositivos as $dispositivo){

            $db_dispositivo = Inventario::find($dispositivo["id"]);

            $prestamo->dispositivos()->save($db_dispositivo);
        }


        return response()->json("Prestamo creado correctamente id:".$prestamo->id);
    }

    public function update(Prestamo $prestamo){

        //Carga nuevamente las relaciones perdidas anteriormente
        $prestamo->format($prestamo);

        $prestamo->save();

        return back()
            ->with('info', 'Prestamo finalizado con éxito');
    }
}

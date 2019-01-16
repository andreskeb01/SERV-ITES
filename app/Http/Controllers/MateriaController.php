<?php

namespace App\Http\Controllers;

use App\Licenciatura;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Muestra todas las materias  disponibles
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Licenciatura $licenciatura)
    {
        //Muestro la vista con las materias disponibles
        return view('materias.index', compact('licenciatura'));
    }

    /**
     * Regresa todas las materias que tengan el cuatrimestre proporcionado en formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function materiasByCuatrimestre($cuatrimestre, $licenciaturaId)
    {
        $materias = $users = DB::table('materias')->where([
            ['cuatrimestre', '=', $cuatrimestre],
            ['licenciatura_id', '=', $licenciaturaId],
        ])->get();

        //Devuelvo los datos con la licenciatura pedida
        return response()->json($materias);
    }

}

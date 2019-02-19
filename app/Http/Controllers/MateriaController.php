<?php

namespace App\Http\Controllers;

use App\Licenciatura;
use App\Materia;
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
        $materias = DB::table('materias')->where([
            ['cuatrimestre', '=', $cuatrimestre],
            ['licenciatura_id', '=', $licenciaturaId],
        ])->get();

        //Devuelvo los datos con la licenciatura pedida
        return response()->json($materias);
    }

    public function create(){
        $licenciaturas = Licenciatura::latest()->get();
        return view('materias.create', compact('licenciaturas'));

    }

    public function store(){

        $nombre = request()->get('nombre');
        $clave = request()->get('clave');
        $licenciatura = Licenciatura::find(request()->get('id_licenciatura'));
        $cuatrimestre = request()->get('cuatrimestre');

        $newMateria = new Materia([
           'nombre' => $nombre,
           'clave' => $clave,
           'cuatrimestre' => $cuatrimestre,
        ]);

        $licenciatura->materias()->save($newMateria);

        return response()->json("Materia creada correctamente");
    }

}

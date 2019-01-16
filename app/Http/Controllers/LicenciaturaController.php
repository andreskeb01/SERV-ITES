<?php

namespace App\Http\Controllers;

use App\Licenciatura;
use Illuminate\Http\Request;

class LicenciaturaController extends Controller
{
    /**
     * Muestra todas las licenciaturas disponibles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Trae todas licenciaturas  recien creadas paginadas en 10
        $licenciaturas = Licenciatura::paginate(10);

        //Muestro la vista con los libros disponibles
        return view('licenciaturas.index', compact('licenciaturas'));
    }

    /**
     * Regresa una licenciatura segun el id proporcionado en formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function licenciaturaById($id)
    {
        $licenciatura = Licenciatura::find($id);

        //Devuelvo los datos con la licenciatura obtenida
        return response()->json($licenciatura);
    }
}

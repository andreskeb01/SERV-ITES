<?php

namespace App\Http\Controllers;

use App\Licenciatura;
use Illuminate\Http\Request;

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
}

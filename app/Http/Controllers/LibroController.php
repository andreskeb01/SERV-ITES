<?php

namespace App\Http\Controllers;

use App;

use App\Licenciatura;
use App\Materia;
use App\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Muestra todos los libros disponibles
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Trae todos los libros con los recien creados paginados en 10
        $libros = Libro::latest()->paginate(10);

        //Muestro la vista con los libros disponibles
        return view('libros.index', compact('libros'));
    }

    /**
     * Muestra el formulario para crear un nuevo libro
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $licenciaturas = Licenciatura::all();
        return view('libros.create', compact('licenciaturas'));
    }

    /**
     * Guarda un nuevo libro en la tabla libros
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verificar como obtener el nombre de la imagen
        $filename  = $request->file('img')->getClientOriginalName();
        $imagen_libro = $request->file('img');

        //Guardamos la imagen en disco
        $path = Storage::putFile('libros', $imagen_libro);

        $libro = new Libro([
            'titulo' => $request->request->get('titulo'),
            'autor' => $request->request->get('autor'),
            'numero' => $request->request->get('numero'),
        ]);
        $libro->url_image = $path;

        //Busco la materia con el id y lo relaciono al libro creado
        $materia = Materia::find($request->request->get('id_materia'));
        $libro->materia()->associate($materia);
        $libro->save();

        //Regresamos a la vista con el response y dejamos
        //que ajax redireccione a la vista de libros en create.blade.php
        return response()->json('Libro guardado'.$path);

    }

    /**
     * Muestra el detalle de un libro.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Muestra el formulario para editar un libro
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $licenciaturas = Licenciatura::all();
        return view('libros.edit', compact('libro', 'licenciaturas'));
    }

    /**
     * Actualiza el libro especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Verificar como obtener el nombre de la imagen
        //$filename  = $request->file('img')->getClientOriginalName();

        dd($request);
        $imagen_libro = $request->file('img');
        $id_libro = $request->file('libro_id');

        //Guardamos la imagen en disco
        $path = Storage::putFile('libros', $imagen_libro);

        $libro = Libro::find($id_libro);
        $libro->titulo = $request->request->get('titulo');
        $libro->autor = $request->request->get('autor');
        $libro->numero = $request->request->get('numero');

        //Busco la materia con el id y lo relaciono al libro creado
        $materia = Materia::find($request->request->get('id_materia'));
        $libro->materia()->sync($materia);
        $libro->save();

        //Regresamos a la vista con el response y dejamos
        //que ajax redireccione a la vista de libros en create.blade.php
        //return response()->json('Libro actualizado'.$path);
    }

    /**
     * Elimina el libro especificado
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}

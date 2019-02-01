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

        $libroparam = $request->request->get('libro');
        $materiaparam = $request->request->get('materia');

        $libro = new Libro([
            'titulo' => $libroparam['titulo'],
            'autor' => $libroparam['autor'],
            'numero' => $libroparam['numero'],
        ]);
        //Busco la materia con el id y lo relaciono al libro creado
        $materia = Materia::find($materiaparam['id']);
        $libro->materia()->associate($materia);
        $libro->save();

        //IMAGE
        $path= Storage::disk('public')->put('image', $request->request->get('file'));
        $libro->fill(['url_image' => asset($path)])->save();


        //Redirecciona a la vista de libros
        return redirect()->route('libros.index')
            ->with('info', 'Libro guardado con éxito');

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
        return view('libros.edit', compact('libro'));
    }

    /**
     * Actualiza el libro especificado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->update($request->all());

        return redirect()->route('libros.edit', $libro->id)
            ->with('info', 'Libro actualizado con éxito');
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

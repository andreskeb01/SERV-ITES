<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['libro_id', 'nombre', 'clave'];

    //me devuelve a quien estoy ligado (la tabla padre)
    public function materia(){
        return $this->belongsTo(Materia::class, 'libro_id');
    }
}

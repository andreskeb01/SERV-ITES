<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['materia_id', 'titulo', 'autor', 'numero'];

    //me devuelve a quien estoy ligado (la tabla padre)
    public function materia(){
        return $this->belongsTo(Materia::class, 'materia_id');
    }
}

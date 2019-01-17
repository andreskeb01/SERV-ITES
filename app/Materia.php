<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = ['licenciatura_id', 'nombre', 'clave', 'cuatrimestre'];

    public function licenciatura(){
        return $this->belongsTo(Licenciatura::class, 'licenciatura_id');
    }

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}

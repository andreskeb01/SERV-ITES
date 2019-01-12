<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenciatura extends Model
{
    protected $table = 'licenciaturas';

    protected $fillable = ['nombre', 'clave', 'url_image'];

    public function materias(){
        return $this->hasMany(Materia::class);
    }

}

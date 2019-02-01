<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $fillable = ['nombre', 'num_serie', 'modelo', 'descripcion', 'clave'];

    

}

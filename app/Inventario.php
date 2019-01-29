<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    public function categoria(){
        return $this->hasOne(Categoria::class);
    }

    public function tipoCategoria(){
        return $this->hasOne(TipoCategoria::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $fillable = ['nombre', 'num_serie', 'modelo', 'descripcion', 'clave'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'inventario_categoria_tipo');
    }

    public function scopeNombre($query, $nombre)
    {

        $query->where('nombre','LIKE',"%$nombre%");

    }

}

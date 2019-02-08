<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';

    protected $fillable = ['prestamo_id', 'nombre', 'num_serie', 'modelo', 'descripcion', 'clave'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'inventario_categoria_tipo');
    }

    public function prestamo(){
        return $this->belongsTo(Prestamo::class, 'prestamo_id');
    }

    public function scopeNombre($query, $nombre)
    {
        $query->where('nombre','LIKE',"%$nombre%");
    }

}

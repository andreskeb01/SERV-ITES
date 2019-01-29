<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre', 'descripcion'];

    public function tipos(){
        return $this->hasMany(TipoCategoria::class);
    }

    public function inventario(){
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }

}

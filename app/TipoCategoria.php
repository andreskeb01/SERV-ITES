<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model
{
    protected $table = 'tipo_categorias';

    protected $fillable = ['categoria_id', 'nombre'];



    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    public function inventario(){
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }



}

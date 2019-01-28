<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model
{

protected $table = 'tipo_categorias';

    protected $fillable = ['tipo_id', 'nombre'];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'tipo_id');
    }


}

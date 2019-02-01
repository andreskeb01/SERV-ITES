<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre', 'descripcion'];

    public function tipos()
    {
        return $this->belongsToMany(Tipo::class,'categoria_tipo')
                    ->withPivot('tipo_id')
                    ->withTimestamps();
    }

    public function inventarios()
    {
        return $this->belongsToMany(Inventario::class,'inventario_categoria_tipo')
            ->withPivot('inventario_id')
            ->withTimestamps();
    }

}

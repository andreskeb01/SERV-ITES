<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre', 'descripcion'];

    //Agrega un tipo a la categoria
    public function tipos()
    {
        return $this->belongsToMany(Tipo::class,'categoria_tipo')
                    ->withPivot('tipo_id')
                    ->withTimestamps();
    }

    //Relaciona la categoria con los dispositivos que pertenezcan ella
    public function inventarios()
    {
        return $this->belongsToMany(Inventario::class,'inventario_categoria_tipo')
            ->withPivot('inventario_id')
            ->withTimestamps();
    }

    //Relaciona la categoria con los dispositivos que pertenezcan ella y tengan el tipo proporcionado
    public function inventariosByTipo($tipo)
    {
        return $this->belongsToMany(Inventario::class,'inventario_categoria_tipo')
            ->where('tipo_id', $tipo)
            ->withPivot('inventario_id')
            ->withTimestamps();
    }

}

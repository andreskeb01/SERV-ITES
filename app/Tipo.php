<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';

    protected $fillable = ['tipo'];

    public function categoria(){
        return $this->belongsToMany(Categoria::class,'categoria_tipo')
            ->withPivot('categoria_id')
            ->withTimestamps();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenciaturas extends Model
{

    public function materias(){

        return $this->hasMany( Materias::class, 'id' );

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{

    protected $table = 'prestamos';

    protected $fillable = [ 'total', 'hora_salida', 'status'];

    public function usuario(){
        return $this->hasOne(User::class);
    }

    public function dispositivos(){
        return $this->hasMany(Inventario::class);
    }

    public function delete(){

        //$this->dispositivos()->detach();
        $this->usuario()->detach();

        // Borra el prestamo
        return parent::delete();
    }

}

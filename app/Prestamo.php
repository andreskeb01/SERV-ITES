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

    public function scopeRelaciones($query, $usuario, $dispositivos){
        $query->with($usuario, $dispositivos)->where('status','=','activo');
    }

    public function format(Prestamo $prestamo)
    {
        $prestamo->loadMissing('usuario');
        $prestamo->loadMissing('dispositivos');

        return [
            'usuario' => $prestamo->usuario,
            'dispositivos' => $prestamo->dispositivos
        ];
    }

    public function actualizar(Prestamo $prestamo, $datetime)
    {


    }

    protected static function boot()
    {
        static::deleting(function ($prestamo){
            parent::boot();
            if(! \App::runningInConsole()){
                //Carga nuevamente las relaciones perdidas anteriormente
                $prestamo->format($prestamo);

                //Actualizamos los ids del prestamo a null
                //para suprimir las relaciones de usuario y dispositivos
                $prestamo->usuario->prestamo_id = null;
                foreach($prestamo->dispositivos as $dispositivo){
                    $dispositivo->prestamo_id = null;
                }
                $prestamo->status = "finalizado";

                //Actualizamos el registro
                $prestamo->push();
            }
        });
    }

}

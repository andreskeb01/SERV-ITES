<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //status [expirado = no se entregaron los equipos en el dia prestado
        //        activo = se inicio el prestamo de dispositivos
        //        finalizado = se entregaron los equipos en el mismo dia que se prestaron]
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->enum('status', ['expirado', 'activo', 'finalizado'])->default('activo');
            $table->timestamps();
            $table->timestamp('hora_salida')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}

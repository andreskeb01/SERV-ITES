<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_inventario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('num_serie')->unique();
            $table->string('modelo');
            $table->string('descripcion');
            $table->string('clave');
            $table->unsignedInteger('history_prestamo_id')->nullable();
            $table->foreign('history_prestamo_id')->references('id')->on('history_prestamos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_inventario');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_prestamos', function (Blueprint $table) {
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
        Schema::dropIfExists('history_prestamos');
    }
}

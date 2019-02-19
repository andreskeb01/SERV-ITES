<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerAfterPrestamoDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        USE SERVITES;
        
        CREATE TRIGGER tr_create_after_prestamo_delete AFTER DELETE ON prestamos 
        FOR EACH ROW    
        BEGIN
            IF OLD.status <> `activo` 
                INSERT INTO history_prestamos (`total`, `status`, `hora_salida`, `created_at`, `updated_at`) 
                VALUES (OLD.total, OLD.status, OLD.hora_salida, OLD.created_at, OLD.updated_at);
                INSERT INTO history_inventario (`nombre`, `num_serie`, `modelo`, `descripcion`, `clave`, `history_prestamo_id`,`created_at`, `updated_at`) 
                SELECT nombre, num_serie, modelo, descripcion, clave, prestamo_id, created_at, updated_at FROM inventario WHERE prestamo_id = OLD.id;
                INSERT INTO history_users (`name`, `email`, `history_prestamo_id`, `created_at`, `updated_at`) 
                SELECT name, email, prestamo_id, created_at, updated_at FROM users WHERE prestamo_id = OLD.id;
            ENDIF
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('USE SERVITES; DROP TRIGGER `tr_create_after_prestamo_delete`');
    }
}

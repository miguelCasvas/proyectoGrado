<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkNotificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->foreign('id_tipo_salida', 'notificaciones_fk_tipo_salidas')->references('id_tipo_salida')->on('tipo_salidas');
            $table->foreign('id_usuario', 'notificaciones_fk_usuarios')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->dropForeign('notificaciones_fk_tipo_salidas');
            $table->dropForeign('notificaciones_fk_usuarios');
        });
    }
}

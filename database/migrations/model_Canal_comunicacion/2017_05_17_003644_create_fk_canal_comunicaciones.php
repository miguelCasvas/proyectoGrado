<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkCanalComunicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('canal_comunicaciones', function (Blueprint $table) {
            $table->foreign('id_usuario','canal_comunicaciones_fk_usuarios')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('canal_comunicaciones', function (Blueprint $table) {
            $table->dropForeign('canal_comunicaciones_fk_usuarios');
        });
    }
}

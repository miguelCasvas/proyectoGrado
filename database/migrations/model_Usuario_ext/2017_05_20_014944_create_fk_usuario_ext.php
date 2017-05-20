<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkUsuarioExt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario_ext', function (Blueprint $table) {
            $table->foreign('id_usuario','usuario_ext_fk_usuarios')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario_ext', function (Blueprint $table) {
            $table->dropForeign('usuario_ext_fk_usuarios');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkConjuntos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conjuntos', function (Blueprint $table) {
            $table->foreign('id_ciudad', 'conjuntos_fk_ciudades')->references('id_ciudad')->on('ciudades');
            $table->foreign('id_catalogo', 'conjuntos_fk_catalogos')->references('id_catalogo')->on('catalogos');
            $table->foreign('id_usuario', 'conjuntos_fk_usuarios')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conjuntos', function (Blueprint $table) {
            $table->dropForeign('conjuntos_fk_ciudades');
            $table->dropForeign('conjuntos_fk_catalogos');
            $table->dropForeign('conjuntos_fk_usuarios');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkMarcados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marcados', function (Blueprint $table) {
            $table->foreign('id_canal','marcados_fk_canal')->references('id_canal')->on('canal_comunicaciones');
            $table->foreign('id_tipo_salida','marcados_fk_tipo_salidas')->references('id_tipo_salida')->on('tipo_salidas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marcados', function (Blueprint $table) {
            $table->dropForeign('marcados_fk_canal');
            $table->dropForeign('marcados_fk_tipo_salidas');
        });
    }
}

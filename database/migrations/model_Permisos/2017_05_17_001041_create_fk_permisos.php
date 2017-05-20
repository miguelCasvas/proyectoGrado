<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkPermisos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->foreign('id_estado','permisos_fk_estados')->references('id_estado')->on('estados');
            $table->foreign('id_rol','permisos_fk_roles')->references('id_rol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos', function (Blueprint $table) {
            $table->dropForeign('permisos_fk_estados');
            $table->dropForeign('permisos_fk_roles');
        });
    }
}

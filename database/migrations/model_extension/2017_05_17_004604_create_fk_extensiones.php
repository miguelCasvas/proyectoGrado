<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkExtensiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extensiones', function (Blueprint $table) {
            $table->foreign('id_estado','extensiones_fk_estados')->references('id_estado')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extensiones', function (Blueprint $table) {
            $table->dropForeign('extensiones_fk_estados');
        });
    }
}

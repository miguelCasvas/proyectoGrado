<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexCatalogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogos', function (Blueprint $table) {
            $table->index('id_conjunto', 'IXFK_Catalogo_Conjunto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogos', function (Blueprint $table) {
            $table->dropIndex('IXFK_Catalogo_Conjunto');
        });
    }
}

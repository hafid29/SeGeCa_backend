<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyMstBuildingMstBuildingType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_building', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('mst_building_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_building', function (Blueprint $table) {
            $table->dropForeign('mst_building_type_id_foreign');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyMstBuildingMstBuildingDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_building', function (Blueprint $table) {
            $table->foreign('detail_id')->references('id')->on('mst_building_detail')->onUpdate('cascade');
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
            $table->dropForeign('mst_building_detail_id_foreign');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelateProductIdToBuilding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_content', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('mst_building');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_content', function (Blueprint $table) {
            $table->dropForeign('mst_content_product_id_foreign');
        });
    }
}

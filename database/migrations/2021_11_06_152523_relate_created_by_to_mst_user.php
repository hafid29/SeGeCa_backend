<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelateCreatedByToMstUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_content', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('mst_user')->onUpdate('cascade');
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
            $table->dropForeign('mst_content_created_by_foreign');
        });
    }
}

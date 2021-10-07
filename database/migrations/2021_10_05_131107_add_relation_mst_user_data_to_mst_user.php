<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationMstUserDataToMstUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_user_data', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('mst_user')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mst_user_data', function (Blueprint $table) {
            $table->dropForeign('mst_user_data_user_id_foreign');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_user_data', function (Blueprint $table) {
            $table->bigInteger("id")->autoIncrement();
            $table->TEXT("no_telp",12);
            $table->string("photo_profile",255);
            $table->string("first_name",20);
            $table->string("last_name",20);
            $table->bigInteger("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_user_data');
    }
}

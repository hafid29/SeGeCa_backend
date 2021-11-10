<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCateringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_catering', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('catering_name', 32);
            $table->bigInteger('user_id');
            $table->bigInteger('type_id');
            $table->bigInteger('detail_id');
            $table->tinyInteger('is_active')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_catering');
    }
}

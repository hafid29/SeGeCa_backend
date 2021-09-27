<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMstBuildingDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_building_detail', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('building_address',32);
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->integer('capacity');
            $table->timestamp('operation_start')->useCurrent();
            $table->timestamp('operation_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_building_detail');
    }
}

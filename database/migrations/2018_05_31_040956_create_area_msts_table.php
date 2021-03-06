<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Area_Code',10);
            $table->unique('Area_Code');
            $table->string('Company_Code',10);
            $table->string('Area_Name',50);
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_msts');
    }
}

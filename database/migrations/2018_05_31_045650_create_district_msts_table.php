<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('District_Code',10);
            $table->string('Area_Code',10);
            $table->string('District_Name',50);
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('District_Code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_msts');
    }
}

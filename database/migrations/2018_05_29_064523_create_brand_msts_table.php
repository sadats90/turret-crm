<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Brand_mstID',20);
            $table->string('Brand_Name',25);
            $table->string('Company_Code',10);
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->unique('Brand_mstID');
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
        Schema::dropIfExists('brand_msts');
    }
}

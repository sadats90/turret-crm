<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Store_Code',10);
            $table->string('area_name',255);
            $table->string('district_name',255);
            $table->string('concept_name',255);
            $table->string('Company_Code')->nullable();
            $table->unique('Store_Code');
            $table->string('Store_Name',50);
            $table->string('Store_Address',120)->nullable();
            $table->string('Store_District',25)->nullable();
            $table->string('Store_Thana',25)->nullable();
            $table->string('Store_City',25)->nullable();
            $table->string('Store_Country',25)->nullable();
            $table->datetime('Store_Opening_Date')->nullable();
            $table->datetime('Store_Closing_Date')->nullable();
            $table->string('Store_Rent',16)->nullable();
            $table->string('Store_Initial_Week',10)->nullable();
            $table->string('Store_Advanced',10)->nullable();
            $table->string('District_Code',10);
            $table->datetime('Rent_Pay_Date')->nullable();
            $table->string('Store_Manager',10)->nullable();
            $table->string('Concept_Code',5);
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
        Schema::dropIfExists('store_msts');
    }
}

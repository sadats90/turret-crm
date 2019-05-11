<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code');
            $table->string('store_type_code');
            $table->string('store_type_name');
            $table->string('store_type_description');           
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
        Schema::dropIfExists('store_types');
    }
}

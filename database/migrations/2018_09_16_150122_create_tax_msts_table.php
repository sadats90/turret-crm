<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code',10);
            $table->integer('Tax_Code')->length(10);
            $table->string('Tax_Type',50);
            $table->integer('Tax_Percent')->length(10);
            $table->integer('year')->length(4);
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
        Schema::dropIfExists('tax_msts');
    }
}

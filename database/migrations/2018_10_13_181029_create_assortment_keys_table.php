<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssortmentKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assortment_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code',20);
            $table->string('key_code',60);       
            $table->string('Gender_mstID',5);
            $table->string('Size_Code',20);
            $table->integer('Qty_R1')->length(10)->default(0)->signed();
            $table->integer('Qty_R2')->length(10)->default(0)->signed();
            $table->integer('Qty_R3')->length(10)->default(0)->signed();
            $table->integer('Qty_R4')->length(10)->default(0)->signed();
            $table->integer('Qty_R5')->length(10)->default(0)->signed();
            $table->integer('Qty_R6')->length(10)->default(0)->signed();
            $table->integer('Qty_R7')->length(10)->default(0)->signed();
            $table->integer('Qty_R8')->length(10)->default(0)->signed();
            $table->integer('Qty_R9')->length(10)->default(0)->signed();
            $table->integer('Qty_R10')->length(10)->default(0)->signed();
            $table->integer('Qty_R11')->length(10)->default(0)->signed();
            $table->integer('Qty_R12')->length(10)->default(0)->signed();
            $table->integer('Qty_R13')->length(10)->default(0)->signed();
            $table->integer('Qty_R14')->length(10)->default(0)->signed();
            $table->integer('Qty_R15')->length(10)->default(0)->signed();
            $table->string('Qty_total',60)->nullable();

       

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
        Schema::dropIfExists('assortment_keys');
    }
}

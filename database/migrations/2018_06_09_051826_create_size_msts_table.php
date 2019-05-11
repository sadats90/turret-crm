<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Size_Code');
            $table->string('Company_Code',25)->nullable();
            $table->string('R1')->nullable();
            $table->string('R2')->nullable();
            $table->string('R3')->nullable();
            $table->string('R4')->nullable();
            $table->string('R5')->nullable();
            $table->string('R6')->nullable();
            $table->string('R7')->nullable();
            $table->string('R8')->nullable();
            $table->string('R9')->nullable();
            $table->string('R10')->nullable();
            $table->string('R11')->nullable();
            $table->string('R12')->nullable();
            $table->string('R13')->nullable();
            $table->string('R14')->nullable();
            $table->string('R15')->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Size_Code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size_msts');
    }
}

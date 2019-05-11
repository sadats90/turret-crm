<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveChdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_chds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Receive_Invoice_No');
            $table->string('Receive_Chd_Seq_No');
            $table->string('Article_Code');
            $table->string('Size_Group');
            $table->string('Qty_R1')->length(10)->nullable();
            $table->string('Qty_R2')->length(10)->nullable();
            $table->string('Qty_R3')->length(10)->nullable();
            $table->string('Qty_R4')->length(10)->nullable();
            $table->string('Qty_R5')->length(10)->nullable();
            $table->string('Qty_R6')->length(10)->nullable();
            $table->string('Qty_R7')->length(10)->nullable();
            $table->string('Qty_R8')->length(10)->nullable();
            $table->string('Qty_R9')->length(10)->nullable();
            $table->string('Qty_R10')->length(10)->nullable();
            $table->string('Qty_R11')->length(10)->nullable();
            $table->string('Qty_R12')->length(10)->nullable();
            $table->string('Qty_R13')->length(10)->nullable();
            $table->string('Qty_R14')->length(10)->nullable();
            $table->string('Qty_R15')->length(10)->nullable();
            $table->string('Total_Qty')->length(14)->nullable();
            $table->string('Cost_R1')->length(10)->nullable();
            $table->string('Cost_R2')->length(10)->nullable();
            $table->string('Cost_R3')->length(10)->nullable();
            $table->string('Cost_R4')->length(10)->nullable();
            $table->string('Cost_R5')->length(10)->nullable();
            $table->string('Cost_R6')->length(10)->nullable();
            $table->string('Cost_R7')->length(10)->nullable();
            $table->string('Cost_R8')->length(10)->nullable();
            $table->string('Cost_R9')->length(10)->nullable();
            $table->string('Cost_R10')->length(10)->nullable();
            $table->string('Cost_R11')->length(10)->nullable();
            $table->string('Cost_R12')->length(10)->nullable();
            $table->string('Cost_R13')->length(10)->nullable();
            $table->string('Cost_R14')->length(10)->nullable();
            $table->string('Cost_R15')->length(10)->nullable();
            $table->string('Total_Cost')->length(14)->nullable();
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
        Schema::dropIfExists('receive_chds');
    }
}

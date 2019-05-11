<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchChdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_chds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Dispatch_Chd_Seq_No');
            $table->string('Dispatch_Invoice_No');
            $table->string('Supply_Chd_Seq_No');
            $table->string('Store_Code');
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
            $table->string('Total_Qty')->length(10)->nullable();
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
            $table->string('Total_Cost')->length(10)->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Dispatch_Chd_Seq_No','Dispatch_Invoice_No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispatch_chds');
    }
}

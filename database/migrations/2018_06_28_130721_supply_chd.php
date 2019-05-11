<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SupplyChd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_chds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Supply_Invoice_No', 191);
            $table->string('Supply_Chd_Seq_No', 191);
            $table->string('Article_Code', 191);
            $table->string('Size_Group', 191)->nullable();
            $table->integer('Qty_R1')->length(10)->nullable();
            $table->integer('Qty_R2')->length(10)->nullable();
            $table->integer('Qty_R3')->length(10)->nullable();
            $table->integer('Qty_R4')->length(10)->nullable();
            $table->integer('Qty_R5')->length(10)->nullable();
            $table->integer('Qty_R6')->length(10)->nullable();
            $table->integer('Qty_R7')->length(10)->nullable();
            $table->integer('Qty_R8')->length(10)->nullable();
            $table->integer('Qty_R9')->length(10)->nullable();
            $table->integer('Qty_R10')->length(10)->nullable();
            $table->integer('Qty_R11')->length(10)->nullable();
            $table->integer('Qty_R12')->length(10)->nullable();
            $table->integer('Qty_R13')->length(10)->nullable();
            $table->integer('Qty_R14')->length(10)->nullable();
            $table->integer('Qty_R15')->length(10)->nullable();
            $table->integer('Total_Qty')->length(14)->nullable();
            $table->integer('Cost_R1')->length(10)->nullable();
            $table->integer('Cost_R2')->length(10)->nullable();
            $table->integer('Cost_R3')->length(10)->nullable();
            $table->integer('Cost_R4')->length(10)->nullable();
            $table->integer('Cost_R5')->length(10)->nullable();
            $table->integer('Cost_R6')->length(10)->nullable();
            $table->integer('Cost_R7')->length(10)->nullable();
            $table->integer('Cost_R8')->length(10)->nullable();
            $table->integer('Cost_R9')->length(10)->nullable();
            $table->integer('Cost_R10')->length(10)->nullable();
            $table->integer('Cost_R11')->length(10)->nullable();
            $table->integer('Cost_R12')->length(10)->nullable();
            $table->integer('Cost_R13')->length(10)->nullable();
            $table->integer('Cost_R14')->length(10)->nullable();
            $table->integer('Cost_R15')->length(10)->nullable();
            $table->integer('Total_Cost')->length(14)->nullable();
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
        Schema::dropIfExists('supply_chds');
    }
}

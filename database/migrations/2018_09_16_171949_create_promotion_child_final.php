<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionChildFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_child_final', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Promotion_Code');
            $table->string('Promotion_Chd_Seq_No');
            $table->string('Article_mstID_Old')->nullable();
            $table->string('Article_mstID_New')->nullable();
            $table->string('Reduction_Type')->nullable()->comment = "1=Reduction Pct(%),2=Reduction To,3=Reduction By";
            $table->string('Reduction_Amount')->nullable();
            $table->string('Article_Price_New')->nullable();
            $table->string('Article_Price_Old')->nullable();
            $table->string('Article_Cost')->nullable();
            $table->string('Total_Cost')->nullable();
            $table->string('Total_New_Value')->nullable();
            $table->string('Total_Old_Value')->nullable();
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
        Schema::dropIfExists('promotion_child_final');
    }
}

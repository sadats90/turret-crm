<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionMasterFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_master_final', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Promotion_Code');
            $table->string('promotion_Title')->nullable();
            $table->string('promotion_Description')->nullable();
            $table->string('Company_Code');
            $table->string('Date_From')->nullable();
            $table->string('Date_To')->nullable();
            $table->string('Promotion_Type_Code')->nullable();
            $table->string('Number_Of_Item')->nullable();
            $table->string('Promotion_Total_Qty')->nullable();
            $table->string('Promotion_Total_Cost')->nullable();
            $table->string('Promotion_Total_New_Value')->nullable();
            $table->string('Promotion_Total_Old_Value')->nullable();
            $table->string('Promotion_Approved_By')->nullable();
            $table->string('Promotion_Approved_Date')->nullable();
            $table->string('Promotion_Approved_Status')->nullable();
            $table->text('Remarks')->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('promotion_Code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_master_final');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Supply_Invoice_No');
            $table->string('Supply_Sender_Code');
            $table->string('Supply_Receiver_Code');
            $table->string('Transport_Company_Code')->nullable();
            $table->date('Date')->nullable();
            $table->string('Number_Of_Item')->nullable();
            $table->integer('Total_Qty')->length(16)->nullable();
            $table->integer('Total_Cost')->length(16)->nullable();
            $table->integer('Total_Value')->length(16)->nullable();
            $table->text('Remarks')->nullable();
            $table->string('Approved_By')->nullable();
            $table->string('Approved_Date')->nullable();
            $table->string('Approved_Status')->default('Proposed');
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Supply_Invoice_No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply_msts');
    }
}

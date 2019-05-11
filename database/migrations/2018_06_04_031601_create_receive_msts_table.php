<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Receive_Invoice_No');
            $table->string('Store_Code')->nullable();
            $table->string('Supply_Invoice_No');
            $table->string('Receive_Total_QTY')->nullable();
            $table->string('Receive_Total_Cost')->nullable();
            $table->string("Receive_Total_Value")->nullable();
            $table->date('Received_Date')->nullable();
            $table->text('Remarks')->nullable();
            $table->string('Status')->default('Received');
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Receive_Invoice_No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('receive_msts');
    }
}

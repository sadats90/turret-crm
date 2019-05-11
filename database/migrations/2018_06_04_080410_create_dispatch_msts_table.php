<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Dispatch_Invoice_No');
            $table->string('Dispatch_Sender_Code')->nullable();
            $table->string('Dispatch_Receiver_Code')->nullable();
            $table->string('Transport_Company_Code')->nullable();
            $table->datetime('Date')->nullable();
            $table->string('Total_Qty')->nullable();
            $table->string('Total_Cost')->nullable();
            $table->string('Total_Value')->nullable();
            $table->string('Approved_By')->nullable();
            $table->string('Approved_Date')->nullable();
            $table->string('Approved_Status')->default('Proposed');
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Dispatch_Invoice_No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Dispatch_msts');
    }
}

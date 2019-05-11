<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code',25)->nullable();
            $table->string('Customer_Id','16');
            $table->string('Customer_Name','50');
            $table->string('Customer_Gender','50');
            $table->string('Marital_Status','50')->nullable();
            $table->string('Customer_Address','100')->nullable();
            $table->string('Customer_District','20')->nullable();
            $table->string('Customer_Thana','20')->nullable();
            $table->string('Customer_City','20')->nullable();
            $table->string('Customer_Country','20')->nullable();
            $table->string('Location_Of_Living','20')->nullable();
            $table->string('Customer_Phone','11')->nullable();
            $table->string('Customer_Email','50')->nullable();
            $table->string('Customer_Card_No','16')->nullable();
            $table->datetime('Customer_Card_Expired_Date')->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Customer_Id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_msts');
    }
}

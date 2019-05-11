<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sales_mst_code');
            $table->string('Store_Code');
            $table->string('Customer_Id')->nullable();
            $table->integer('count_line');
            $table->integer('Total_Qty');
            $table->double('Total_Value');
            $table->double('Total_tax')->nullable();
            $table->integer('card_type')->nullable();
            $table->string('card_num','')->nullable();
            $table->string('payment_type','')->nullable();
            $table->string('voucher_code','')->nullable();
            $table->string('cash_paid','')->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('sales_mst_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_msts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesChdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_chds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Sales_chd_Code');
            $table->string('Sales_Chd_Seq_No');
            $table->string('Store_Code');
            $table->string('Emp_Code');
            $table->string('Article_mstID');
            $table->string('Size');
            $table->integer('Quantity');
            $table->string('Price_1');
            $table->string('Discount')->nullable();
            $table->string('Article_Price_New')->nullable();
            $table->integer('Tax_No');
            $table->string('Promotion_Code')->nullable();
            $table->string('Customer_Id')->nullable();
            $table->string('Category_Code','50')->nullable();
            $table->string('Staff_Type','50')->nullable();
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
        Schema::dropIfExists('sales_chds');
    }
}

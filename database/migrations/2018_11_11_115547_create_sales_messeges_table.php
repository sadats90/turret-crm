<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesMessegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_messeges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code',20)->nullable();
            $table->string('Store_Code',25)->nullable();
            $table->string('Emp_Code',10)->nullable();
     		$table->string('msg_type')->nullable();
            $table->string('msg_text')->nullable();
            $table->string('url')->nullable();
            $table->string('img_url')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();          
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
        Schema::dropIfExists('sales_messeges');
    }
}

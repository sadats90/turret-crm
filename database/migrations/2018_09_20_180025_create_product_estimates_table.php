<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Company_Code');
            $table->String('year');
            $table->String('group_type');
            $table->String('group_id');
            $table->String('period_type');
            $table->String('period_id');
            $table->String('product_group_type');
            $table->String('product_group_type_id'); 
            $table->integer('sale_qty')->length(10)->default(0);
            $table->double('sale_price',14);
            $table->double('sale_cost',14);
            $table->integer('rcv_qty')->length(10)->default(0);
            $table->double('rcv_price',14);
            $table->double('rcv_cost',14);
            $table->integer('stock_qty')->length(10)->default(0);
            $table->double('stock_price',14);
            $table->double('stock_cost',14);
            $table->integer('promo_qty')->length(10)->default(0);
            $table->double('promo_price',14);
            $table->double('promo_cost',14);
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
        Schema::dropIfExists('product_estimates');
    }
}

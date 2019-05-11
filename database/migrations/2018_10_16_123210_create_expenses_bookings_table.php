<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *


id, store_code,account_code,amount, , date,posted_by,ref_number,description,others


     * @return void
     */
    public function up()
    {
        Schema::create('expenses_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Store_Code')->nullable();
            $table->string('Company_Code')->nullable();
            $table->string('account_code')->nullable();
            $table->string('amount')->nullable();
            $table->date('date');
            $table->string('posted_by')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('expenses_bookings');
    }
}

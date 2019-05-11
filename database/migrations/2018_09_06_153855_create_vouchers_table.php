<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Voucher_code',10)->nullable();
            $table->string('Type',10)->nullable();
            $table->string('CPU',10)->nullable();
            $table->string('Voucher_description',50)->nullable();
            $table->string('Campaign_Code',10)->nullable();
            $table->string('Company_Code',10)->nullable();
            $table->string('Amount_Core',10)->nullable();
            $table->string('Amount_Available',10)->nullable();
            $table->dateTime('From_Date',6)->nullable();
            $table->dateTime('To_Date',6)->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}

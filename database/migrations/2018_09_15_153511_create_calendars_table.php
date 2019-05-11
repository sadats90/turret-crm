<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code');
            $table->string('PeriodType');
            $table->string('PeriodId');
           
            $table->date('StartDate');
            $table->date('EndDate');
            $table->string('Year');
            $table->string('User')->nullable();
            $table->string('ip')->nullable();
            $table->string('delete_cd')->nullable();
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
        Schema::dropIfExists('calendars');
    }
}

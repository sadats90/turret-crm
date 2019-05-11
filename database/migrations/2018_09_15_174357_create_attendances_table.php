<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Emp_code');
            $table->string('latitude')->nullable();;
            $table->string('longitude')->nullable();;
            $table->timestamp('timeIn')->nullable();;
            $table->timestamp('timeOut')->nullable();;
            $table->date('date')->nullable();;
            $table->string('ip')->nullable();;
            $table->string('remarkIn',70)->nullable();;
            $table->string('remarkOut',70)->nullable();;
            $table->string('delete_cd')->nullable();;
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
        Schema::dropIfExists('attendances');
    }
}

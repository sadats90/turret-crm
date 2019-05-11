<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Campaign_Code',10)->nullable();
            $table->string('Campaign_Title',50)->nullable();
            $table->string('Campaign_Description',50)->nullable();
            $table->string('Company_Code',25)->nullable();
            $table->string('Campaign_manager',50)->nullable();
            $table->dateTime('From_Date')->nullable();
            $table->dateTime('To_Date')->nullable();
            
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
        Schema::dropIfExists('campaigns');
    }
}

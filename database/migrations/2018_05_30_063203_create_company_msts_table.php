<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code',10);
            $table->string('Company_Name',50)->nullable();
            $table->string('Company_Address',120)->nullable();
            $table->string('Company_District',50)->nullable();
            $table->string('Company_Thana',50)->nullable();
            $table->string('Company_City',50)->nullable();
            $table->string('Company_Country',50)->nullable();
            $table->string('Company_Email',50)->nullable();
            $table->string('Company_Phone',15)->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Company_Code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_msts');
    }
}

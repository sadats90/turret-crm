<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Emp_Code',10);
            $table->unique('Emp_Code');
            $table->integer('Role_Id')->length(10)->nullable();
            $table->string('Company_Code',10);
            $table->string('Emp_Name',50);
            $table->string('Emp_Email',25)->nullable();
            $table->string('Emp_Address',120)->nullable();
            $table->string('Emp_District',10)->nullable();
            $table->string('Emp_Thana',10)->nullable();
            $table->string('Emp_City',10)->nullable();
            $table->string('Emp_Country',10)->nullable();
            $table->string('designation',25)->nullable();
            $table->string('Emp_password',25)->nullable();
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
        Schema::dropIfExists('employee_msts');
    }
}

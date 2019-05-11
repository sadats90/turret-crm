<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleMst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company_Code',25)->nullable();
            $table->string('Sub_Sub_category_mstID',25)->nullable();
            $table->string('Article_mstID',20);
            $table->string('Group',10)->nullable();
            $table->string('Type',10)->nullable();
            $table->string('Upper_Materials',10)->nullable();
            $table->string('Color',10)->nullable();
            $table->string('Similar_Article',20)->nullable();
            $table->string('Initial_Week',10)->nullable();
            $table->string('Initial_Date',10)->nullable();
            $table->string('Article_Name',50);
            $table->string('Project',50)->nullable();
            $table->string('Category_Code',5);
            $table->string('Sub_category_mstID',10);
            $table->string('Brand_mstID',5);
            $table->string('Country_of_Origin',25)->nullable();
            $table->string('Supplier',50)->nullable();
            $table->string('Supplier_Reference',10)->nullable();
            $table->string('Article_Type',5)->nullable();
            $table->string('Currency',10)->nullable();
            $table->string('BTN_Tariff_Code',10)->nullable();
            $table->string('Collection_Type',10)->nullable();
            $table->string('Collection_Name',25)->nullable();
            $table->string('Target_Customer',25)->nullable();
            $table->string('Type_Of_Construction',10)->nullable();
            $table->string('Upper',25)->nullable();
            $table->string('Lining',25)->nullable();
            $table->string('Outsole',25)->nullable();
            $table->string('Features',25)->nullable();
            $table->string('Other_Color',25)->nullable();
            $table->string('Type_Of_Development',5)->nullable();
            $table->string('Article_Description',50)->nullable();
            $table->string('Estimated_SOR',10)->nullable();
            $table->string('Selling_Period',10)->nullable();
            $table->string('Channel',10)->nullable();
            $table->string('Introduction_Week',10)->nullable();
            $table->string('Expt_Delv_Month',10)->nullable();
            $table->string('Sale_By_Week',10)->nullable();
            $table->string('Price_Group',5)->nullable();
            $table->double('Price_1',14)->nullable();
            $table->double('Price_2',14)->nullable();
            $table->double('MRP_1',14)->nullable();
            $table->double('MRP_2',14)->nullable();
            $table->string('Finpack_Type',5)->nullable();
            $table->double('Finpack_Price',14)->nullable();
            $table->double('Standard_Cost',14)->nullable();
            $table->double('Manufacture_Cost',14)->nullable();
            $table->double('Purchase_Cost',14)->nullable();
            $table->double('Cost_Local',14)->nullable();
            $table->double('FOB_Cost',14)->nullable();
            $table->string('FOB_Currency',10)->nullable();
            $table->integer('Awg_Weight')->length(5)->nullable();
            $table->integer('Height')->length(5)->nullable();
            $table->integer('Width')->length(5)->nullable();
            $table->integer('Length')->length(5)->nullable();
            $table->integer('Tax_Code')->length(10);
            $table->string('Article_Size_Code',5);
           
            $table->integer('R1')->length(10)->nullable();
            $table->integer('R2')->length(10)->nullable();
            $table->integer('R3')->length(10)->nullable();
            $table->integer('R4')->length(10)->nullable();
            $table->integer('R5')->length(10)->nullable();
            $table->integer('R6')->length(10)->nullable();
            $table->integer('R7')->length(10)->nullable();
            $table->integer('R8')->length(10)->nullable();
            $table->integer('R9')->length(10)->nullable();
            $table->integer('R10')->length(10)->nullable();
            $table->integer('R11')->length(10)->nullable();
            $table->integer('R12')->length(10)->nullable();
            $table->integer('R13')->length(10)->nullable();
            $table->integer('R14')->length(10)->nullable();
            $table->integer('R15')->length(10)->nullable();
            $table->integer('R16')->length(10)->nullable();
            $table->string('delete_cd',10)->default('Y');
            $table->string('user',10)->nullable();
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->unique('Article_mstID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_msts');
    }
}

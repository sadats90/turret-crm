<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryMstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_msts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Inventory_code',10)->nullable();
            $table->string('Store_Code',10);
            $table->string('Article_Code',20);
            $table->string('Size_Group',5)->nullable();
            $table->integer('Qty_R1')->length(10)->default(0)->signed();
            $table->integer('Qty_R2')->length(10)->default(0)->signed();
            $table->integer('Qty_R3')->length(10)->default(0)->signed();
            $table->integer('Qty_R4')->length(10)->default(0)->signed();
            $table->integer('Qty_R5')->length(10)->default(0)->signed();
            $table->integer('Qty_R6')->length(10)->default(0)->signed();
            $table->integer('Qty_R7')->length(10)->default(0)->signed();
            $table->integer('Qty_R8')->length(10)->default(0)->signed();
            $table->integer('Qty_R9')->length(10)->default(0)->signed();
            $table->integer('Qty_R10')->length(10)->default(0)->signed();
            $table->integer('Qty_R11')->length(10)->default(0)->signed();
            $table->integer('Qty_R12')->length(10)->default(0)->signed();
            $table->integer('Qty_R13')->length(10)->default(0)->signed();
            $table->integer('Qty_R14')->length(10)->default(0)->signed();
            $table->integer('Qty_R15')->length(10)->default(0)->signed();
            $table->double('Cost_R1',14)->default(0);
            $table->double('Cost_R2',14)->default(0);
            $table->double('Cost_R3',14)->default(0);
            $table->double('Cost_R4',14)->default(0);
            $table->double('Cost_R5',14)->default(0);
            $table->double('Cost_R6',14)->default(0);
            $table->double('Cost_R7',14)->default(0);
            $table->double('Cost_R8',14)->default(0);
            $table->double('Cost_R9',14)->default(0);
            $table->double('Cost_R10',14)->default(0);
            $table->double('Cost_R11',14)->default(0);
            $table->double('Cost_R12',14)->default(0);
            $table->double('Cost_R13',14)->default(0);
            $table->double('Cost_R14',14)->default(0);
            $table->double('Cost_R15',14)->default(0);
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
        Schema::dropIfExists('inventory_msts');
    }
}

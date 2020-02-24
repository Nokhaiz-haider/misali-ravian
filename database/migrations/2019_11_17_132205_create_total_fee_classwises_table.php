<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotalFeeClasswisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_fee_classwises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("class_name");
            $table->string("fee_month")->nullable();
            $table->string("total_fee_amount");
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
        Schema::dropIfExists('total_fee_classwises');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fee_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('std_reg_id');
            $table->string('std_class');
            $table->string('fee_submonth');
            $table->string('fee_subyear');
            $table->string('fee_amount');
            $table->string('fee_subdate');
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
        Schema::dropIfExists('student_fee_histories');
    }
}

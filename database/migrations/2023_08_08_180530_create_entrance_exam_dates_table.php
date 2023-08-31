<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntranceExamDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrance_exam_dates', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name')->nullable();
            $table->date('exam_date')->nullable();
            $table->string('sitting')->nullable();
            $table->string('exam_time')->nullable();
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
        Schema::dropIfExists('entrance_exam_dates');
    }
}

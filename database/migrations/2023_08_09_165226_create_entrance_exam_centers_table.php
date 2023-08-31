<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntranceExamCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrance_exam_centers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('program_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->string('exam_location')->nullable();
            $table->string('exam_center')->nullable();
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
        Schema::dropIfExists('entrance_exam_centers');
    }
}

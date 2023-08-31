<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterPlannedWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_planned_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prog_repo_id')->nullable();
            $table->string('semester')->nullable();
            $table->string('form_date')->nullable();
            $table->string('to_date')->nullable();
            $table->text('planned_work')->nullable();
            $table->text('actual_work')->nullable();
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
        Schema::dropIfExists('semester_planned_works');
    }
}

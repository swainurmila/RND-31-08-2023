<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_progress_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->nullable();
            $table->string('semester')->nullable();
            $table->string('year')->nullable();
            $table->string('date')->nullable();
            $table->string('name')->nullable();
            $table->string('faculty_name')->nullable();
            $table->string('phd_work')->nullable();
            $table->string('nodal_center')->nullable();
            $table->string('enrollment_no')->nullable();
            $table->string('enrollment_date')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('supervisor_1')->nullable();
            $table->string('supervisor_2')->nullable();
            $table->text('desc_work')->nullable();
            $table->text('difficulties_encounter')->nullable();
            $table->string('dsc_file')->nullable();
            $table->integer('supervisor_status')->nullable()->default(0);
            $table->string('supervisor_remarks')->nullable();
            $table->string('nodal_status')->nullable()->default(0);
            $table->string('nodal_remark')->nullable();
            $table->string('control_status')->nullable()->default(0);
            $table->string('control_remarks')->nullable();
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
        Schema::dropIfExists('semester_progress_reports');
    }
}

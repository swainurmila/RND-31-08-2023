<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCourseWorksApplicationRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course_works_application_remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of PhdApplicationInfo table');
            $table->bigInteger('course_sub_id')->comment('PK of course_work_subjects table');
            $table->text('dsc1_remarks')->nullable()->comment('Remarks DSC experts Chairperson');
            $table->text('dsc2_remarks')->nullable()->comment('Remarks DSC experts Co-Chairperson');
            $table->text('dsc3_remarks')->nullable()->comment('Remarks DSC experts1');
            $table->text('dsc4_remarks')->nullable()->comment('Remarks DSC experts2');
            $table->text('dsc5_remarks')->nullable()->comment('Remarks DSC experts Supervisor');
            $table->text('dsc6_remarks')->nullable()->comment('Remarks DSC experts Co-Supervisor');
            $table->tinyInteger('dsc1_status')->default(0)->comment('Coursework application status of Chairperson');
            $table->tinyInteger('dsc2_status')->default(0)->comment('Coursework application status of Co-Chairperson');
            $table->tinyInteger('dsc3_status')->default(0)->comment('Coursework application status of DSE 1');
            $table->tinyInteger('dsc4_status')->default(0)->comment('Coursework application status of DSE 2');
            $table->tinyInteger('dsc5_status')->default(0)->comment('Coursework application status of Supervisor');
            $table->tinyInteger('dsc6_status')->default(0)->comment('Coursework application status of Co-Supervisor');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_course_works_application_remarks');
    }
}

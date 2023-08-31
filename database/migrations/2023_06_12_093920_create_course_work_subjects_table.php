<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseWorkSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_course_work_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of PhdApplicationInfo');
            $table->string('subject_code', 150)->nullable()->comment('Subject Code');
            $table->string('course_title', 150)->nullable()->comment('Course Title');
            $table->integer('credits')->unsigned()->nullable()->comment('Score given by the NCR for each subject codes.');
            $table->string('remarks', 255)->nullable()->comment('Remarks');
            $table->tinyInteger('status')->default(0)->comment('');
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
        Schema::dropIfExists('tbl_course_work_subjects');
    }
}

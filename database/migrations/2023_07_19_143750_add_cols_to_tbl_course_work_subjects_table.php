<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToTblCourseWorkSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_course_work_subjects', function (Blueprint $table) {
            $table->string('grades')->nullable()->comment('grades on subject')->after('status');
            $table->string('passing_date')->nullable()->comment('Date of Passing')->after('grades');
            $table->string('passing_remark')->nullable()->comment('remark on passing')->after('passing_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_course_work_subjects', function (Blueprint $table) {
            $table->dropColumn('grades');
            $table->dropColumn('passing_date');
            $table->dropColumn('passing_remark');
        });
    }
}

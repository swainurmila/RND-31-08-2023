<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTblCourseWorksApplicationRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_course_works_application_remarks', function (Blueprint $table) {
            $table->bigInteger('dsc_1')->nullable()->comment('PK of respective nodal user table')->after('course_sub_id');
            $table->bigInteger('dsc_2')->nullable()->comment('PK of respective nodal user table')->after('dsc_1');
            $table->bigInteger('dsc_3')->nullable()->comment('PK of respective nodal user table chairperson')->after('dsc_2');
            $table->bigInteger('dsc_4')->nullable()->comment('PK of respective nodal user table co-chairperson')->after('dsc_3');
            $table->bigInteger('dsc_5')->nullable()->comment('PK of supervisor')->after('dsc_4');
            $table->bigInteger('dsc_6')->nullable()->comment('PK of co-supervisor')->after('dsc_5');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_course_works_application_remarks', function (Blueprint $table) {
            $table->dropColumn('dsc_1');
            $table->dropColumn('dsc_2');
            $table->dropColumn('dsc_3');
            $table->dropColumn('dsc_4');
            $table->dropColumn('dsc_5');
            $table->dropColumn('dsc_6');
        });
    }
}

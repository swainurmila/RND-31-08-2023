<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModififyColumnInTblCourseWorksApplicationRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_course_works_application_remarks', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('appl_id');
            $table->dropColumn('course_sub_id');
            $table->dropColumn('dsc_1');
            $table->dropColumn('dsc_2');
            $table->dropColumn('dsc_3');
            $table->dropColumn('dsc_4');
            $table->dropColumn('dsc_5');
            $table->dropColumn('dsc_6');
            $table->dropColumn('dsc1_remarks');
            $table->dropColumn('dsc2_remarks');
            $table->dropColumn('dsc3_remarks');
            $table->dropColumn('dsc4_remarks');
            $table->dropColumn('dsc5_remarks');
            $table->dropColumn('dsc6_remarks');
            $table->dropColumn('dsc1_status');
            $table->dropColumn('dsc2_status');
            $table->dropColumn('dsc3_status');
            $table->dropColumn('dsc4_status');
            $table->dropColumn('dsc5_status');
            $table->dropColumn('dsc6_status');

            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of phd_application_info');
            $table->bigInteger('course_sub_id')->nullable()->comment('PK of tbl_phd_courseworks');
            $table->bigInteger('ncr_id')->nullable()->comment('PK of Nodal Center');
            $table->integer('dsc_type')->comment('DSC1 to DSC6');
            $table->integer('user_type')->comment('PK of roles');
            $table->bigInteger('user_id')->comment('PK of respective ncr_user_table, nodal_user_*');
            $table->text('remarks')->nullable()->comment('Remarks of respective users');
            $table->tinyInteger('status')->default(0)->comment('0: not recommended, 1: recommended');
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
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of Nodal Center');
            $table->bigInteger('course_sub_id')->nullable()->comment('PK of Nodal Center');
            $table->bigInteger('dsc_1')->nullable()->comment('PK of respective nodal user table');
            $table->bigInteger('dsc_2')->nullable()->comment('PK of respective nodal user table');
            $table->bigInteger('dsc_3')->nullable()->comment('PK of respective nodal user table chairperson');
            $table->bigInteger('dsc_4')->nullable()->comment('PK of respective nodal user table co-chairperson');
            $table->bigInteger('dsc_5')->nullable()->comment('PK of supervisor');
            $table->bigInteger('dsc_6')->nullable()->comment('PK of co-supervisor');
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
        });
    }
}

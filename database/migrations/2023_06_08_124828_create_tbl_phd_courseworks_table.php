<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPhdCourseworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_phd_courseworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of phd_application_info');
            $table->text('work_brief_desc')->nullable()->comment('Brief descript of research work proposed.');
            $table->text('equip_brief_desc')->nullable()->comment('Majot equiptment/facilities necessary to carry out the project and means of obtaining them.');
            $table->text('residence_plan_desc')->nullable()->comment('Plan of residence on campus');
            $table->text('work_brief_desc_sup')->nullable()->comment('Brief descript of research work proposed.');
            $table->text('equip_brief_desc_sup')->nullable()->comment('Majot equiptment/facilities necessary to carry out the project and means of obtaining them.');
            $table->boolean('student_signature')->nullable()->default(false)->comment('students signature');
            $table->date('date_of_commence')->nullable()->comment('date of commencement of research work');
            $table->text('sup_comment')->nullable()->comment('Supervisor comment');
            $table->boolean('sup_signature')->nullable()->default(false)->comment('supervisors signature');
            $table->bigInteger('sup_id')->nullable()->comment('Supervisor id after signed');
            $table->boolean('co_sup_signature')->nullable()->default(false)->comment('co-supervisors signature');
            $table->bigInteger('cosup_id')->nullable()->comment('Co-supervisor id after signed');
            $table->tinyInteger('status')->default(0)->comment('Status infor in helper');
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
        Schema::dropIfExists('tbl_phd_courseworks');
    }
}

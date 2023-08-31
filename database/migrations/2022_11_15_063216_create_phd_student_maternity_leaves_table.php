<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdStudentMaternityLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phd_student_maternity_leaves', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->nullable();
            $table->string('name')->nullable();
            $table->string('faculty')->nullable();
            $table->string('branch')->nullable();
            $table->string('nodal_center')->nullable();
            $table->string('enrollment_no')->nullable();
            $table->string('enrollment_date')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('telephone')->nullable();
            $table->text('address')->nullable();
            $table->text('reason_seeking_leave')->nullable();
            $table->text('rearch_status')->nullable();
            $table->string('leave_from')->nullable();
            $table->string('leave_to')->nullable();
            $table->string('leave_avail')->nullable();
            $table->integer('supervisor_status')->nullable()->default(0);
            $table->string('supervisor_remarks')->nullable();
            $table->string('nodal_status')->nullable()->default(0);
            $table->string('nodal_remark')->nullable();
            $table->string('vc_status')->nullable()->default(0);
            $table->string('vc_remark')->nullable();
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
        Schema::dropIfExists('phd_student_maternity_leaves');
    }
}

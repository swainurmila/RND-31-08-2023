<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvisionalRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provisional_registrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appl_id')->nullable()->comment('PK of PhdApplicationInfo');
            $table->bigInteger('stud_id')->nullable()->comment('PK of students');
            $table->date('thesis_submission_date')->nullable()->comment('Date of thesis submission');
            $table->tinyInteger('course_completed')->default(0)->comment('Course is completed or not');
            $table->integer('credit_completed')->nullable()->comment('total credits completed');
            $table->string('grade_sheet')->nullable()->comment('Grade sheet of the student');
            $table->string('dsc_signed_cert')->nullable()->comment('signed certificate of dsc');
            $table->tinyInteger('status')->default(0)->comment('overall application status');
            $table->text('sup_remark')->nullable()->comment('Remark of Supervisor');
            $table->text('cosup_remark')->nullable()->comment('Remark of Co-Supervisor');
            $table->text('ncr_remark')->nullable()->comment('Remark of NCR');
            $table->text('je_remark')->nullable()->comment('Remark of je');
            $table->text('rnd_remark')->nullable()->comment('Remark of rnd');
            $table->text('vc_remark')->nullable()->comment('Remark of VC');
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
        Schema::dropIfExists('provisional_registrations');
    }
}

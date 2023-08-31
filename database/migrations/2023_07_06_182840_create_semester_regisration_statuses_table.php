<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterRegisrationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_regisration_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sem_payment_id')->nullable()->comment('PK of semester_payments');
            $table->bigInteger('appl_id')->nullable()->comment('PK of PhdApplicationInfo');
            $table->integer('semester')->nullable()->comment('semester of student');
            $table->tinyInteger('sup_cert')->default(0)->comment('certified from supervisor');
            $table->tinyInteger('status')->default(0)->comment('overall application status');
            $table->text('sup_remark')->nullable()->comment('Remark of Supervisor');
            $table->tinyInteger('ncr_cert')->default(0)->comment('certified from ncr');
            $table->text('ncr_remark')->nullable()->comment('Remark of NCR');
            $table->text('je_remark')->nullable()->comment('Remark of je');
            $table->text('rnd_remark')->nullable()->comment('Remark of rnd');
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
        Schema::dropIfExists('semester_regisration_statuses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appl_id')->nullable()->comment('PK of PhdApplicationInfo');
            $table->integer('semester')->nullable()->comment('semester of student');
            $table->integer('month_elapsed')->nullable();
            $table->tinyInteger('reg_status')->default(0)->comment('registration status');
            $table->tinyInteger('draft_status')->default(0)->comment('draft status');
            $table->string('ncr_pmode', 150)->nullable()->comment('Mode of payment at NCR');
            $table->string('ncr_pbank', 190)->nullable()->comment('Payment Bank at NCR');
            $table->date('ncr_pdate')->nullable()->comment('Payment Date of NCR');
            $table->float('ncr_pamount')->nullable()->comment('Payment Amount');
            $table->string('ncr_preceipt')->nullable()->comment('Payment Receipt');
            $table->date('bput_pdate')->nullable()->comment('Payment Date of BPUT');
            $table->float('bput_pamount')->nullable()->comment('Payment Amount at BPUT');
            $table->tinyInteger('bput_pstatus')->default(0)->comment('status of payment, success or failed');
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
        Schema::dropIfExists('semester_payments');
    }
}

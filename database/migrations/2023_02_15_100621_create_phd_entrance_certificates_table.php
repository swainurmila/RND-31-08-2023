<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdEntranceCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phd_entrance_certificates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->nullable();
            $table->text('high_school_certificate')->nullable();
            $table->text('memo_high_school')->nullable();
            $table->text('intermidiate_certificate')->nullable();
            $table->text('memo_intermediate')->nullable();
            $table->text('ug_certificate')->nullable();
            $table->text('memo_ug')->nullable();
            $table->text('pg_mphil_cerficate')->nullable();
            $table->text('memo_pg_mphil')->nullable();
            $table->text('sc_st_certficate')->nullable();
            $table->text('proof_national_eligibility')->nullable();
            $table->text('passport_photographs')->nullable();
            $table->text('adhaar_card')->nullable();
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
        Schema::dropIfExists('phd_entrance_certificates');
    }
}

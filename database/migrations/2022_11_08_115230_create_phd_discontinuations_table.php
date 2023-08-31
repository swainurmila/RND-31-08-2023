<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdDiscontinuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phd_discontinuations', function (Blueprint $table) {
            $table->id();
            $table->integer('stud_id');
            $table->string('name');
            $table->string('enrollment_no');
            $table->date('enrollment_date');
            $table->string('faculty');
            $table->string('regd_no');
            $table->date('registration_date');
            $table->string('branch');
            $table->string('topic');
            $table->string('present_center');
            $table->string('research_details');
            $table->string('progress');
            $table->string('discontinuation_reason');
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
        Schema::dropIfExists('phd_discontinuations');
    }
}

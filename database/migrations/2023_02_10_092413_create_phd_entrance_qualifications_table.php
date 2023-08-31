<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdEntranceQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phd_entrance_qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->nullable();
            $table->string('degree')->nullable();
            $table->string('university_board')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('division')->nullable();
            $table->string('precentage')->nullable();
            $table->text('subject')->nullable();
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
        Schema::dropIfExists('phd_entrance_qualifications');
    }
}

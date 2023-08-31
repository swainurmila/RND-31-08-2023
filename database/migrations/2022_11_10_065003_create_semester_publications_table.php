<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_publications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prog_repo_id')->nullable();
            $table->string('author')->nullable();
            $table->string('title_paper')->nullable();
            $table->string('journal')->nullable();
            $table->string('vol_no')->nullable();
            $table->string('page_no')->nullable();
            $table->string('attach_file')->nullable();
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
        Schema::dropIfExists('semester_publications');
    }
}

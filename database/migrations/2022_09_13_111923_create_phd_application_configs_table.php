<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdApplicationConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phd_application_configs', function (Blueprint $table) {
            $table->id();
            $table->string('appl_title')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->float('application_fee');
            $table->string('appl_type')->nullable();
            $table->integer('active');
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
        Schema::dropIfExists('phd_application_configs');
    }
}

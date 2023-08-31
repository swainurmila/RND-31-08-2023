<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhdEntrancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phd_entrances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('photo')->nullable();
            $table->string('father_husband_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique()->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->date('dob')->nullable();
            $table->string('category')->nullable();
            $table->string('nationality')->nullable();
            $table->string('mother_tounge')->nullable();
            $table->text('selection_ncr')->nullable();
            $table->string('branch')->nullable();
            $table->string('claim_entrance')->nullable();
            $table->string('enclosures')->nullable();
            $table->string('department')->nullable();
            $table->string('dd_no')->nullable();
            $table->date('dd_date')->nullable();
            $table->string('dd_bank')->nullable();
            $table->text('signature')->nullable();
            $table->string('registration_no')->nullable();
            $table->date('date')->nullable();
            $table->string('place')->nullable();
            $table->string('draft_status')->nullable()->default(0);
            $table->string('status')->nullable()->default(0);
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
        Schema::dropIfExists('phd_entrances');
    }
}

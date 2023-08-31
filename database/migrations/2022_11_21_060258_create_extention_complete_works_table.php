<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtentionCompleteWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extention_complete_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('stud_id')->nullable();
            $table->string('name')->nullable();
            $table->string('faculty')->nullable();
            $table->string('branch')->nullable();
            $table->string('nodal_center')->nullable();
            $table->string('date_of_commencement')->nullable();
            $table->string('enrollment_no')->nullable();
            $table->string('enrollment_date')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('reg_date')->nullable();
            $table->text('component_not_completed')->nullable();
            $table->integer('supervisor_status')->nullable()->default(0);
            $table->string('supervisor_remarks')->nullable();
            $table->string('nodal_status')->nullable()->default(0);
            $table->string('nodal_remark')->nullable();
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
        Schema::dropIfExists('extention_complete_works');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDscExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dsc_expert', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->comment('PK of phd_application_info');
            $table->bigInteger('professor_id')->comment('PK of tbl_professors');
            $table->tinyInteger('status')->default(0)->comment('choosen active for PHD student by VC > 0: Inactive 1: Active');
            $table->bigInteger('created_by')->nullable()->comment();
            $table->bigInteger('updated_by')->nullable()->comment();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_dsc_expert');
    }
}

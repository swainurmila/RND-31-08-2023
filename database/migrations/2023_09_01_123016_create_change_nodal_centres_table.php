<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeNodalCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_nodal_centres', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('appl_id')->nullable();
            $table->tinyInteger('stud_id')->nullable();
            $table->text('research_status')->nullable();
            $table->integer('present_nodal_center')->nullable();
            $table->integer('proposed_nodal_center')->nullable();
            $table->integer('present_sup')->nullable();
            $table->integer('proposed_sup')->nullable();
            $table->integer('present_cosup')->nullable();
            $table->integer('proposed_cosup')->nullable();
            $table->text('change_reason')->nullable();
            $table->string('change_document')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('cur_sup_remark')->nullable();
            $table->text('new_sup_remark')->nullable();
            $table->text('cur_ncr_remark')->nullable();
            $table->text('new_ncr_remark')->nullable();
            $table->text('je_remark')->nullable();
            $table->text('rnd_cell_remark')->nullable();
            $table->text('vc_remark')->nullable();
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
        Schema::dropIfExists('change_nodal_centres');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_remarks', function (Blueprint $table) {
            $table->bigIncrements('remarks_id');
            $table->bigInteger('appl_id')->comment('PK of phd_application_info');
            $table->text('supervisor')->nullable()->comment('Supervisor remarks');
            $table->text('ncr')->nullable()->comment('Nodal Center remarks');
            $table->text('je')->nullable()->comment('JE remarks');
            $table->text('vc')->nullable()->comment('VC remarks');
            $table->text('rnd_cell')->nullable()->comment('RnD Cell remarks');
            $table->bigInteger('created_by')->nullable()->comment('PK of respective account table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of respective account table');
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
        Schema::dropIfExists('tbl_remarks');
    }
}

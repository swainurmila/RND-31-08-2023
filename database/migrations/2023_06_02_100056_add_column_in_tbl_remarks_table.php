<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTblRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_remarks', function (Blueprint $table) {
            $table->string('transfer_to_rnd_remarks', 100)->nullable()->after('rnd_cell_overall')->comment('Transfer to JE remarks will be added after the vc has approved the application.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_remarks', function (Blueprint $table) {
            $table->dropColumn('transfer_to_rnd_remarks');
        });
    }
}

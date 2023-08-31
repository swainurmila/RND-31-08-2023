<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOverallInTblRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_remarks', function (Blueprint $table) {
            $table->string('ncr_overall', 255)->nullable()->comment('Overall remarjs of respective ncr')->after('ncr');
            $table->string('je_overall', 255)->nullable()->comment('Overall remarjs of respective je')->after('je');
            $table->string('vc_overall', 255)->nullable()->comment('Overall remarjs of respective vc')->after('vc');
            $table->string('rnd_cell_overall', 255)->nullable()->comment('Overall remarjs of respective rnd_cell')->after('rnd_cell');
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
            $table->dropColumn('ncr_overall');
            $table->dropColumn('je_overall');
            $table->dropColumn('vc_overall');
            $table->dropColumn('rnd_cell_overall');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToTblPhdCourseworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_phd_courseworks', function (Blueprint $table) {
            $table->string('nodal_comment')->nullable()->comment('comment of ncr')->after('sup_comment');
            $table->string('je_comment')->nullable()->comment('comment of ncr')->after('nodal_comment');
            $table->string('rndcell_comment')->nullable()->comment('comment of ncr')->after('je_comment');
            $table->string('vc_comment')->nullable()->comment('comment of ncr')->after('rndcell_comment');
            $table->string('dsc_letter')->nullable()->comment('uploaded dsc letter')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_phd_courseworks', function (Blueprint $table) {
            $table->dropColumn('dsc_letter');
            $table->dropColumn('nodal_comment');
            $table->dropColumn('je_comment');
            $table->dropColumn('rndcell_comment');
            $table->dropColumn('vc_comment');
        });
    }
}

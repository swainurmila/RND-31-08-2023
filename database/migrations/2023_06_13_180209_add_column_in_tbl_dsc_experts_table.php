<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTblDscExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_dsc_expert', function (Blueprint $table) {
            $table->dropColumn('professor_id');
            $table->bigInteger('ncr_id')->nullable()->comment('Nodal center id to track the nodal center user')->after('appl_id');
            $table->bigInteger('ncr_user_id')->nullable()->comment('Nodal center user id')->after('ncr_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_dsc_expert', function (Blueprint $table) {
            $table->dropColumn('ncr_id');
            $table->dropColumn('ncr_user_id');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToChangeResearchSupervisorNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('change_research_supervisor_name', function (Blueprint $table) {
            $table->string('recognisation_letter')->nullable()->after('approved_by_bput');
            $table->string('dsc_remark')->nullable()->after('dsc_approved');
            $table->string('rd_remark')->nullable()->after('rd_approved');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_research_supervisor_name', function (Blueprint $table) {
            $table->dropColumn('recognisation_letter');
            $table->dropColumn('dsc_remark');
            $table->dropColumn('rd_remark');
        });
    }
}

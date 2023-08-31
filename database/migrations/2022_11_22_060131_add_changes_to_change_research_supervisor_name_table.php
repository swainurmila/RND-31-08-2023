<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangesToChangeResearchSupervisorNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('change_research_supervisor_name', function (Blueprint $table) {
            $table->string('status')->default('0')->after('reason_for_change');
            $table->dropColumn(['dsc_approved', 'rd_approved', 'vice_chancellor']);
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
            $table->dropColumn('status');
        });
    }
}

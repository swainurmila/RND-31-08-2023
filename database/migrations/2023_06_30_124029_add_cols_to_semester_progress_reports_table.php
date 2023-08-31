<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToSemesterProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semester_progress_reports', function (Blueprint $table) {
            $table->renameColumn('supervisor_status', 'status');
            // $table->string('je_remark')->nullable()->change();
            $table->renameColumn('nodal_status', 'je_remark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('semester_progress_reports', function (Blueprint $table) {
            $table->renameColumn('status', 'supervisor_status');
            // $table->string('nodal_status')->nullable()->change();
            $table->renameColumn('je_remark', 'nodal_status');
        });
    }
}

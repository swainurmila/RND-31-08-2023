<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileToPhdDiscontinuations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_discontinuations', function (Blueprint $table) {
            $table->string('file',255)->after('research_details')->nullable();
            $table->integer('status')->default(0);
            $table->text('remark_supervisor')->after('status')->nullable();
            $table->text('remark_nodal_center')->after('remark_supervisor')->nullable();
            $table->text('remark_controlcell')->after('remark_nodal_center')->nullable();
            $table->text('remark_vc')->after('remark_controlcell')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd_discontinuations', function (Blueprint $table) {
            $table->dropColumn('file');
            $table->dropColumn('status');
            $table->dropColumn('remark_supervisor');
            $table->dropColumn('remark_nodal_center');
            $table->dropColumn('remark_controlcell');
            $table->dropColumn('remark_vc');
        });
    }
}

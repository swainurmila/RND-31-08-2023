<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToChangeNodalCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('change_nodal_center', function (Blueprint $table) {
            $table->string('controlcell_remark')->nullable()->after('rd_approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('change_nodal_center', function (Blueprint $table) {
            $table->dropColumn('controlcell_remark');
        });
    }
}

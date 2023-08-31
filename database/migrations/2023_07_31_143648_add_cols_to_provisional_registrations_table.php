<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToProvisionalRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provisional_registrations', function (Blueprint $table) {
            $table->date('dsc_approve_date')->nullable()->after('ncr_remark');
            $table->date('approve_date')->nullable()->after('vc_remark');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('provisional_registrations', function (Blueprint $table) {
            $table->dropColumn('dsc_approve_date');
            $table->dropColumn('approve_date');
        });
    }
}

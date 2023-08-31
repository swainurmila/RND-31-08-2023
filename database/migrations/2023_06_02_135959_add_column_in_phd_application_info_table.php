<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInPhdApplicationInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_application_info', function (Blueprint $table) {
            $table->string('notification_no', 10)->nullable()->after('application_status')->comment('Notification no given at last by the JE when its is transfered from VC then RnD.');
            $table->dateTime('notification_date')->nullable()->after('notification_no')->comment('Notification no given date.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd_application_info', function (Blueprint $table) {
            $table->dropColumn('notification_no');
            $table->dropColumn('notification_date');
        });
    }
}

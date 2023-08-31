<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInPhdApplicatioInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_application_info', function (Blueprint $table) {
            $table->boolean('notified')->nullable()->default(false)->after('notification_date');
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
            $table->dropColumn('notified');
        });
    }
}

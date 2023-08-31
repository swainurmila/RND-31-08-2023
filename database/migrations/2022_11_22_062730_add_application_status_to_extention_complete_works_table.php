<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApplicationStatusToExtentionCompleteWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extention_complete_works', function (Blueprint $table) {
            $table->integer('application_status')->nullable()->default(0)->after('control_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extention_complete_works', function (Blueprint $table) {
            $table->dropColumn('application_status');
        });
    }
}

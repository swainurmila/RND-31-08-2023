<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToPhdEntrancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_entrances', function (Blueprint $table) {
            $table->string('exam_center')->nullable()->after('claim_entrance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd_entrances', function (Blueprint $table) {
            $table->dropColumn('exam_center');
        });
    }
}

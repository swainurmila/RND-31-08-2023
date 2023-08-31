<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRollnoToPhdEntrancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_entrances', function (Blueprint $table) {
            $table->string('entrance_roll_no')->nullable()->after('is_selected');
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
            $table->dropColumn('entrance_roll_no');
        });
    }
}

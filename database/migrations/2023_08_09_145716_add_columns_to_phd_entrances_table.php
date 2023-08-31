<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPhdEntrancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_entrances', function (Blueprint $table) {
            $table->tinyInteger('is_selected')->default(0)->nullable()->after('status');
            $table->text('admin_remark')->nullable()->after('is_selected');
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
            $table->dropColumn('is_selected');
            $table->dropColumn('admin_remark');
        });
    }
}

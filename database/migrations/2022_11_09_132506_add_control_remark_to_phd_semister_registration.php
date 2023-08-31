<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddControlRemarkToPhdSemisterRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_semister_registration', function (Blueprint $table) {
            $table->text('control_remark')->after('control_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd_semister_registration', function (Blueprint $table) {
            $table->dropColumn('control_remark');
        });
    }
}

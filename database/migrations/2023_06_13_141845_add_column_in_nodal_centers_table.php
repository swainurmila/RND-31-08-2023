<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInNodalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodal_centres', function (Blueprint $table) {
            $table->string('user_table_name')->nullable()->comment('Name of the originated table while creating a NCR')->after('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nodal_centres', function (Blueprint $table) {
            $table->dropColumn('user_table_name');
        });
    }
}

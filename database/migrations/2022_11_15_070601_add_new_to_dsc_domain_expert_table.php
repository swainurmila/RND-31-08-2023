<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToDscDomainExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dsc_domain_expert', function (Blueprint $table) {
            $table->integer('stud_id')->nullable()->after('dsc_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dsc_domain_expert', function (Blueprint $table) {
            $table->dropColumn('stud_id');
        });
    }
}

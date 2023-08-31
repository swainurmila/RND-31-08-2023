<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDscDomainExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dsc_domain_expert', function (Blueprint $table) {
            $table->string('title_of_rearch_work')->nullable()->after('faculty_of_branch');
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
            $table->dropColumn('title_of_rearch_work');
        });
    }
}

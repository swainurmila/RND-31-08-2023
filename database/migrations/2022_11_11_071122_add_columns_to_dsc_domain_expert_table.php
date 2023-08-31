<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDscDomainExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dsc_domain_expert', function (Blueprint $table) {
            
            $table->integer('request_status')->default('0');
            $table->string('ncr_remark')->nullable();
            $table->string('vc_remark')->nullable();
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
          
            $table->dropColumn('request_status');
            $table->dropColumn('ncr_remark');
            $table->dropColumn('vc_remark');
        });
    }
}

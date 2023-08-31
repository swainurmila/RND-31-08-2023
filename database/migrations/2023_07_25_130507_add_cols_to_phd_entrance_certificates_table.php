<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToPhdEntranceCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_entrance_certificates', function (Blueprint $table) {
            $table->text('mphil_cerficate')->nullable()->after('memo_pg_mphil');
            $table->text('mphil_marksheet')->nullable()->after('mphil_cerficate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd_entrance_certificates', function (Blueprint $table) {
            $table->dropColumn('mphil_cerficate');
            $table->dropColumn('mphil_marksheet');
        });
    }
}

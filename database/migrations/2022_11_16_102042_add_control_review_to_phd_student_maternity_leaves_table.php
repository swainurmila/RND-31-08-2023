<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddControlReviewToPhdStudentMaternityLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phd_student_maternity_leaves', function (Blueprint $table) {
            $table->text('control_review')->nullable()->after('control_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phd_student_maternity_leaves', function (Blueprint $table) {
            $table->dropColumn('control_review');
        });
    }
}

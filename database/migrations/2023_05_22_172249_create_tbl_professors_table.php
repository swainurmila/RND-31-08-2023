<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_professors', function (Blueprint $table) {
            $table->bigIncrements('professor_id');
            $table->bigInteger('ncr_id')->comment('PK of nodal_center');
            $table->bigInteger('dept_id')->comment('PK of departments');
            $table->string('name', 100)->comment('Name of professor');
            $table->string('designation', 100)->comment('1: Professor 2:Associate Professor 3:Chairperson 4:Co-Chairperson');
            $table->text('address')->nullable()->default('')->comment('Professor\'s address');
            $table->string('contact_no', 20)->nullable()->comment('Professor contact no');
            $table->string('email_id', 50)->nullable()->comment('Professor email id');
            $table->tinyInteger('status')->default(0)->comment('0: Inactive 1: Active');
            $table->tinyInteger('proffesor_type')->default(0)->comment('0: Internal 1: External');
            $table->tinyInteger('expert_status')->default(0)->comment('0: Inexpert 1: Expert');
            $table->bigInteger('created_by')->nullable()->comment('PK of User table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of User table');
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
        Schema::dropIfExists('tbl_professors');
    }
}

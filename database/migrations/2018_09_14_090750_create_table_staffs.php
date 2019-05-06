<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->string('alias')->length(64);
            $table->string('username')->length(255);
            $table->string('password')->length(64);
            $table->string('email')->length(255)->nullable();
            $table->string('first_name')->length(100)->nullable();
            $table->string('last_name')->length(100)->nullable();
            $table->string('full_name')->length(255)->nullable();
            $table->tinyInteger('author_type')->length(3)->unsigned()->default(2)->comment('1.Admin 2.Staff');
            $table->string('remember_token')->length(64)->nullable();
            $table->string('reset_password_token')->length(64)->nullable();
            $table->dateTime('reset_password_token_expired')->nullable();
            $table->dateTime('last_access_at')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->bigInteger('deleted_by')->unsigned()->nullable();
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
        Schema::dropIfExists('staffs');
    }
}

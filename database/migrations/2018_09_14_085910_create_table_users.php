<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->string('alias')->length(64);
            $table->string('first_name')->length(100)->nullable();
            $table->string('last_name')->length(100)->nullable();
            $table->string('full_name')->length(255)->nullable();
            $table->string('email')->length(255);
            $table->string('password')->length(64);
            $table->tinyInteger('status')->length(3)->unsigned()->default(1)->comment('1.Register 2.Confirm 3.Unregister');
            $table->string('photo')->length(255)->nullable();
            $table->string('phone_number')->length(11)->nullable();
            $table->string('address')->length(255)->nullable();
            $table->string('description')->length(255)->nullable();
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
        Schema::dropIfExists('users');
    }
}

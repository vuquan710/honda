<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->string('alias')->length(64);
            $table->bigInteger('user_id')->length(11)->nullable();
            $table->string('name_user')->length(255);
            $table->string('phone_number')->length(11)->nullable();
            $table->string('email_user')->length(255)->nullable();
            $table->tinyInteger('status')->length(3)->default(1)->comment('1.Waiting 2.Confirm 3.Success 4.Cancel');
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
        Schema::dropIfExists('orders');
    }
}

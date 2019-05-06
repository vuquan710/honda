<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_product_images', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->bigInteger('p_product_id')->length(11)->unsigned();
            $table->string('description')->length(255)->nullable();
            $table->string('url_thumb')->length(255)->nullable();
            $table->string('url')->length(255)->nullable();
            $table->tinyInteger('is_show')->length(3)->default(1)->comment('0. false, 1: true');
            $table->tinyInteger('is_main')->length(3)->default(0)->comment('0. false, 1: true');
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
        Schema::dropIfExists('p_product_images');
    }
}

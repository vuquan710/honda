<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->bigInteger('news_category_id')->length(11);
            $table->string('small_image')->length(255)->nullable();
            $table->string('short_description')->length(255)->nullable();
            $table->string('meta_keywords')->length(255)->nullable();
            $table->string('meta_title')->length(255)->nullable();
            $table->string('meta_description')->length(255)->nullable();
            $table->string('title')->length(255);
            $table->text('content');
            $table->string('en_short_description')->length(255)->nullable();
            $table->string('en_meta_keywords')->length(255)->nullable();
            $table->string('en_meta_title')->length(255)->nullable();
            $table->string('en_meta_description')->length(255)->nullable();
            $table->string('en_title')->length(255);
            $table->text('en_content')->length(255);
            $table->tinyInteger('is_show')->length(1)->unsigned()->default(1)->comment('0: false, 1: true');
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('news');
    }
}

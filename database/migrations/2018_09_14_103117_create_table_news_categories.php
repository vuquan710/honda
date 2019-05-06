<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNewsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->string('alias')->length(64);
            $table->tinyInteger('position')->length(3)->unsigned()->nullable();
            $table->string('name')->length(255);
            $table->string('meta_title')->length(255)->nullable();
            $table->string('meta_keywords')->length(255)->nullable();
            $table->string('meta_description')->length(255)->nullable();
            $table->string('background_image')->length(255)->nullable();
            $table->text('description')->nullable();
            $table->string('en_name')->length(255);
            $table->string('en_meta_title')->length(255)->nullable();
            $table->string('en_meta_keywords')->length(255)->nullable();
            $table->string('en_meta_description')->length(255)->nullable();
            $table->text('en_description')->nullable();
            $table->tinyInteger('is_show')->length(3)->unsigned()->default(1)->comment('0: false, 1: true');
            $table->tinyInteger('is_show_on_menu')->length(3)->unsigned()->default(1)->comment('0: false, 1: true');
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
        Schema::dropIfExists('news_categories');
    }
}

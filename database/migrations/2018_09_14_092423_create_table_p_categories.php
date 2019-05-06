<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_categories', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->string('name')->length(255)->nullable();
            $table->string('description')->length(255)->nullable();
            $table->bigInteger('parent_id')->length(11)->nullable()->unsigned();
            $table->tinyInteger('level')->length(3)->default(1);
            $table->string('en_name')->length(255)->nullable();
            $table->string('en_description')->length(255)->nullable();
            $table->string('slug')->length(255)->nullable();
            $table->string('url_banner')->length(255)->nullable();
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
        Schema::dropIfExists('p_categories');
    }
}

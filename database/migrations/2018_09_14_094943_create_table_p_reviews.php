<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_reviews', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->bigInteger('p_product_id')->length(11)->unsigned();
            $table->string('name')->length(255);
            $table->text('content')->nullable();
            $table->tinyInteger('rating_number')->length(3)->default(5)->comment('min: 1 star, max: 5 star');
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
        Schema::dropIfExists('p_reviews');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_products', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->string('alias')->length(64);
            $table->bigInteger('p_category_id')->length(11)->unsigned();
            $table->bigInteger('p_vendor_id')->length(11)->nullable()->unsigned();
            $table->string('product_code')->length(255)->nullable();
            $table->string('name')->length(255)->nullable();
            $table->tinyInteger('is_new')->length(3)->default(0)->comment('0: false, 1: true');
            $table->tinyInteger('is_sale')->length(3)->default(0)->comment('0: false, 1: true');
            $table->tinyInteger('is_show')->length(3)->default(1)->comment('0: false, 1: true');
            $table->bigInteger('price')->length(11)->default(0)->nullable();
            $table->bigInteger('price_sale')->length(11)->default(0)->nullable();
            $table->tinyInteger('unit')->length(3)->default(1)->comment('1: VND, 2: USD, 3: EURO');
            $table->integer('quantity')->length(10)->default(0);
            $table->string('image_main_url')->length(255)->nullable();
            $table->string('short_description')->length(255)->nullable();
            $table->text('description')->nullable();
            $table->string('en_name')->length(255)->nullable();
            $table->string('en_short_description')->length(255)->nullable();
            $table->text('en_description')->nullable();
            $table->string('slug')->length(255)->nullable();
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
        Schema::dropIfExists('p_products');
    }
}

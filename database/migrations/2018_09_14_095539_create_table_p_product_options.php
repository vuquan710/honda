<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePProductOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_product_options', function (Blueprint $table) {
            $table->increments('id')->length(11)->unsigned();
            $table->bigInteger('p_product_id')->length(11)->unsigned();
            $table->tinyInteger('display_type')->length(3)->nullable()->comment('1.CheckBox 2.SelectBox 3.RadioBox 4...');
            $table->string('display_name')->length(255)->nullable();
            $table->text('value')->nullable();
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
        Schema::dropIfExists('p_product_options');
    }
}

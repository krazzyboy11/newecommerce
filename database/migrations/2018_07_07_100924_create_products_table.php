<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('child_category_id');
            $table->unsignedInteger('brand_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->Integer('product_regular_price');
            $table->Integer('product_sale_price');
            $table->Integer('product_quantity');
            $table->string('product_sku');
            $table->String('product_short_description');
            $table->String('product_long_description');
            $table->String('product_tag');
            $table->String('product_image');
            $table->boolean('product_feature')->default('0');
            $table->boolean('product_status')->default('0');
            $table->foreign('child_category_id')
                ->references('id')->on('child_categories')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')->on('brands');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

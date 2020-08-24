<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('product_id');
            $table->string('name_product', 300);
            $table->text('description_product', 500);
            $table->float('price_product', 10, 2);
            $table->string('image_product', 256)->nullable();
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
        Schema::dropIfExists('produtcs');
    }
}

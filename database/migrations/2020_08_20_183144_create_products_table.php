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
            $table->bigIncrements('id');
            $table->string('nameProduct', 300);
            $table->text('descriptionProduct', 500);
            $table->float('priceProduct', 10, 2);
            // $table->unsignedBigInteger('user_id')->unique();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->string('user_name',300)->unique();
            // $table->foreign('user_name')->references('name')->on('users');
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

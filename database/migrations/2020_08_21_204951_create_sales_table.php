<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('nameCustomer', 300);
            $table->string('emailCustomer', 150);
            $table->string('cpfCustomer');
            $table->date('date_sale');
            $table->tinyInteger('quantSale');
            $table->float('deductionSale');
            $table->string('statusSale'); 
            $table->float('priceSale', 10, 2);
            $table->string('name_product_sold', 300);
            // $table->unsignedBigInteger('user_id')->unique();         
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->string('user_name',300)->unique();
            // $table->foreign('user_name')->references('name')->on('users');
            // 
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('sales');
    }
}

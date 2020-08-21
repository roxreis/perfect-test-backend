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
            $table->string('nameCustomer');
            $table->string('emailCustomer');
            $table->string('cpfCustomer');
            $table->date('date_sale');
            $table->tinyInteger('quantSale');
            $table->float('deductionSale');
            $table->string('statustSale'); 
            // $table->unsignedBigInteger('user_id')->unique();         
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->string('user_name',300)->unique();
            // $table->foreign('user_name')->references('name')->on('users');
            $table->string('product_name');
            // $table->foreign('product_name')->references('nameProduct')->on('products');
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

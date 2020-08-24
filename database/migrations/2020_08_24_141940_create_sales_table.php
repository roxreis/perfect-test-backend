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
            $table->bigIncrements('sales_id');
            $table->unsignedBigInteger('product_id');
            $table->string('nameCustomer', 300);
            $table->string('emailCustomer', 150);
            $table->string('cpfCustomer');
            $table->date('date_sale');
            $table->tinyInteger('quantSale');
            $table->float('deductionSale');
            $table->string('statusSale'); 
            $table->string('name_product_sold', 300);
            $table->unsignedBigInteger('sales_customer_id')->unique();         
            $table->foreign('sales_customer_id')->references('customer_id')->on('customers');
            $table->unsignedBigInteger('sales_product_id')->unique();
            $table->foreign('sales_product_id')->references('product_id')->on('products');
          
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

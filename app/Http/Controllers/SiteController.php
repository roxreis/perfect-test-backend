<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use App\Customer;


class SiteController extends Controller
{
    public function viewDashboard()
    {
        $sales = Sale::all();
        $customers = Customer::all;
        $products = Product::all();

        //variável contento a formatação desejada de data
        $formatDateSale = $sales->date_sale = date('d/m/Y');
        return view('dashboard', compact('sales', 'products', 'customers', 'formatDateSale'));

    }


}

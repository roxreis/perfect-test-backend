<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;


class SiteController extends Controller
{
    public function viewDashboard()
    {
        $sales = Sale::all();
        $products = Product::all();
        return view('dashboard', compact('sales', 'products'));

    }


}

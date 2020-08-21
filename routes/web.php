<?php

use Illuminate\Support\Facades\Route;



/*
Telas para ver o funcionamento sem dados
*/
// Route::get('/', function () {
//     return view('dashboard');
// });
// Route::get('/sales', function () {
//     return view('crud_sales');
// });
// Route::get('/products', function () {
//     return view('crud_products');
// });
// Route::post('registerSale', 'SaleController');

Route::get('/dashboard', 'SiteController@viewDashboard');
Route::get('/', 'SiteController@viewDashboard');


Route::group(['prefix'=>'produto'], function(){
    Route::post('/cadastrar', 'ProductController@storeProduct');
    Route::get('/cadastrar', 'ProductController@storeProduct');
    Route::get('/novo', 'ProductController@createNewProduct'); 
    Route::put('/atualizar', 'ProductController@updateProduct'); 
    
});

Route::group(['prefix'=>'venda'], function(){
    Route::post('/cadastrar', 'SaleController@storeSale');
    Route::get('/cadastrar', 'SaleController@storeSale');
    Route::get('/nova', 'SaleController@createNewSale');
    Route::put('/atualizar', 'SaleController@updateSale'); 
    Route::get('/editar/{id?}', 'SaleController@editSale'); 
});
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


Route::group(['prefix'=>'cliente'], function(){
    Route::get('/novo', 'CustomerController@createCustomer');
    Route::post('/cadastrar', 'CustomerController@storeCustomer');
});


Route::group(['prefix'=>'produto'], function(){
    Route::post('/cadastrar', 'ProductController@storeProduct');
    Route::get('/cadastrar', 'ProductController@storeProduct');
    Route::get('/novo', 'ProductController@createProduct'); 
    Route::put('/atualizar/{id?}', 'ProductController@updateProduct');
    Route::get('/editar/{id?}', 'ProductController@editProduct'); 

    
});

Route::group(['prefix'=>'venda'], function(){
    Route::post('/cadastrada', 'SaleController@storeSale');
    Route::get('/cadastrada', 'SaleController@storeSale');
    Route::get('/nova', 'SaleController@createSale');
    Route::put('/atualiza/{id?}', 'SaleController@updateSale'); 
    Route::get('/editar/{id?}', 'SaleController@editSale'); 
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

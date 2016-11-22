<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('products', 'ProductController');

Route::get('api/products/datatable', 'ProductController@datatable');

Route::post('products/{id}/add-stock', 'ProductController@addStock')->name('products.addStock');

Route::get('ventas', 'SaleController@index');
Route::get('sales/datatable', 'SaleController@datatable');


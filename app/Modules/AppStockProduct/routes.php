<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['module' => 'AppStockProduct', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockProduct\Controllers'], function() {
    Route::post('stock_product','AppStockProductController@index');
		Route::get('stock_product','AppStockProductController@index');
		Route::post('stock_product/save','AppStockProductController@save');
		Route::get('stock_product/edit/{app_stock_product_id}','AppStockProductController@edit');
		Route::get('stock_product/render_lookup_product','AppStockProductController@renderLookupProduct');
		Route::post('stock_product/update','AppStockProductController@update');
		Route::post('stock_product/destroy','AppStockProductController@destroy');
		
});



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
Route::group(['module' => 'AppPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppSales\Controllers'], function(){
    Route::get('sales','AppSalesController@index');
		Route::post('sales/save','AppSalesController@save');
		Route::get('sales/edit/{app_sales_id}','AppSalesController@edit');
		Route::get('sales/render_lookup_suplier','AppSalesController@renderLookupSuplier');
		Route::post('sales/update','AppSalesController@update');
		Route::post('sales/destroy','AppSalesController@destroy');
});



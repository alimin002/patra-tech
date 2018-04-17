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
Route::group(['module' => 'AppReturnPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReturnPurchase\Controllers'], function(){
    Route::get('return_purchase','AppReturnPurchaseController@index');
		Route::post('return_purchase/save','AppReturnPurchaseController@save');
		Route::get('return_purchase/edit/{app_sales_id}','AppReturnPurchaseController@edit');
		Route::get('return_purchase/render_lookup_suplier','AppReturnPurchaseController@renderLookupSuplier');
		Route::post('return_purchase/update','AppReturnPurchaseController@update');
		Route::post('return_purchase/destroy','AppReturnPurchaseController@destroy');
});



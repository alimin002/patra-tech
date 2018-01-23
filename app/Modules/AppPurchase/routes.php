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
Route::group(['module' => 'AppPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppPurchase\Controllers'], function(){
    Route::get('purchase','AppPurchaseController@index');
		Route::post('purchase','AppPurchaseController@index');
		Route::post('purchase/save','AppPurchaseController@save');
		Route::get('purchase/edit/{app_purchase_id}','AppPurchaseController@edit');
		Route::get('purchase/render_lookup_suplier','AppPurchaseController@renderLookupSuplier');
		Route::post('purchase/update','AppPurchaseController@update');
		Route::post('purchase/destroy','AppPurchaseController@destroy');
});



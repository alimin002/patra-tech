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
Route::group(['module' => 'AppPurchaseDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppPurchaseDetail\Controllers'], function(){
    Route::get('purchase_detail','AppPurchaseDetailController@index');
		Route::post('purchase_detail','AppPurchaseDetailController@index');
		Route::post('purchase_detail/save','AppPurchaseDetailController@save');
		Route::get('purchase_detail/edit/{app_purchase_detail_id}','AppPurchaseDetailController@edit');
		Route::get('purchase_detail/render_lookup_suplier','AppPurchaseDetailController@renderLookupSuplier');
		Route::get('purchase_detail/render_lookup_raw_material','AppPurchaseDetailController@renderLookupRawMaterial');
		Route::post('purchase_detail/update','AppPurchaseDetailController@update');
		Route::post('purchase_detail/update_header','AppPurchaseDetailController@update_header');
		Route::post('purchase_detail/destroy','AppPurchaseDetailController@destroy');
});



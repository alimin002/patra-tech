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
		Route::group(['module' => 'AppReturnPurchaseDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReturnPurchaseDetail\Controllers'], function(){
    Route::get('return_purchase_detail','AppReturnPurchaseDetailController@index');
		Route::post('return_purchase_detail','AppReturnPurchaseDetailController@index');
		Route::post('return_purchase_detail/save','AppReturnPurchaseDetailController@save');
		Route::get('return_purchase_detail/edit/{app_purchase_detail_id}','AppReturnPurchaseDetailController@edit');
		Route::get('return_purchase_detail/download_pdf/{app_purchase_detail_id}','AppReturnPurchaseDetailController@download_pdf');

		Route::get('return_purchase_detail/render_lookup_suplier','AppReturnPurchaseDetailController@renderLookupSuplier');
		Route::get('return_purchase_detail/render_lookup_raw_material','AppReturnPurchaseDetailController@renderLookupRawMaterial');
		Route::post('return_purchase_detail/update','AppReturnPurchaseDetailController@update');
		Route::post('return_purchase_detail/update_header','AppReturnPurchaseDetailController@update_header');
		Route::post('return_purchase_detail/destroy','AppReturnPurchaseDetailController@destroy');
});



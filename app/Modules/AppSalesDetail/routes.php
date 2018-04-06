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
		Route::group(['module' => 'AppSalesDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppSalesDetail\Controllers'], function(){
    Route::get('sales_detail','AppSalesDetailController@index');
		Route::get('sales_detail','AppSalesDetailController@index');
		Route::get('sales_detail/download_pdf/{app_sales_id}','AppSalesDetailController@download_pdf');
		Route::get('sales_detail/preview_pdf/{app_sales_id}','AppSalesDetailController@preview_pdf');
		Route::post('sales_detail/save','AppSalesDetailController@save');
		Route::get('sales_detail/edit/{app_sales_detail_id}','AppSalesDetailController@edit');
		Route::get('sales_detail/render_lookup_suplier','AppSalesDetailController@renderLookupSuplier');
		Route::get('sales_detail/render_lookup_raw_material','AppSalesDetailController@renderLookupRawMaterial');
		Route::post('sales_detail/update','AppSalesDetailController@update');
		Route::post('sales_detail/update_header','AppSalesDetailController@update_header');
		Route::post('sales_detail/destroy','AppSalesDetailController@destroy');
});



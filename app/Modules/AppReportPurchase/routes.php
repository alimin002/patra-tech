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
		Route::group(['module' => 'AppReportPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReportPurchase\Controllers'], function(){
    Route::get('report_purchase','AppReportPurchaseController@index');
		Route::get('report_purchase','AppReportPurchaseController@index');
		Route::get('report_purchase/download_pdf/{date_start}/{date_end}','AppReportPurchaseController@download_pdf');
		Route::get('report_purchase/preview_pdf/{app_sales_id}','AppReportPurchaseController@preview_pdf');
		Route::post('report_purchase/save','AppReportPurchaseController@save');
		Route::post('report_purchase/print_report','AppReportPurchaseController@print_report');
		Route::get('report_purchase/edit/{app_report_purchase_id}','AppReportPurchaseController@edit');
		Route::get('report_purchase/send_report_to_email/{date_start}/{date_end}/{email_address}','AppReportPurchaseController@sendReportToEmail');
		Route::get('report_purchase/render_lookup_suplier','AppReportPurchaseController@renderLookupSuplier');
		Route::get('report_purchase/render_lookup_raw_material','AppReportPurchaseController@renderLookupRawMaterial');
		Route::get('report_purchase/render_lookup_product','AppReportPurchaseController@renderLookupProduct');
		Route::post('report_purchase/update','AppReportPurchaseController@update');
		Route::post('report_purchase/update_header','AppReportPurchaseController@update_header');
		Route::post('report_purchase/destroy','AppReportPurchaseController@destroy');
});
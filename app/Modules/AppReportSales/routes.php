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
		Route::group(['module' => 'AppReportSales', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReportSales\Controllers'], function(){
    Route::get('report_sales','AppReportSalesController@index');
		Route::get('report_sales','AppReportSalesController@index');
		Route::get('report_sales/download_pdf/{app_sales_id}','AppReportSalesController@download_pdf');
		Route::get('report_sales/preview_pdf/{app_sales_id}','AppReportSalesController@preview_pdf');
		Route::post('report_sales/save','AppReportSalesController@save');
		Route::post('report_sales/print_report','AppReportSalesController@print_report');
		Route::get('report_sales/edit/{app_report_sales_id}','AppReportSalesController@edit');
		Route::get('report_sales/send_invoice_to_email/{app_report_sales_id}','AppReportSalesController@sendInvoiceToEmail');
		Route::get('report_sales/render_lookup_suplier','AppReportSalesController@renderLookupSuplier');
		Route::get('report_sales/render_lookup_raw_material','AppReportSalesController@renderLookupRawMaterial');
		Route::get('report_sales/render_lookup_product','AppReportSalesController@renderLookupProduct');
		Route::post('report_sales/update','AppReportSalesController@update');
		Route::post('report_sales/update_header','AppReportSalesController@update_header');
		Route::post('report_sales/destroy','AppReportSalesController@destroy');
});
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
		Route::group(['module' => 'AppStockOpnameRawMaterialDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockOpnameRawMaterialDetail\Controllers'], function(){
    Route::get('stock_opname_raw_material_detail','AppStockOpnameRawMaterialDetailController@index');
		Route::get('stock_opname_raw_material_detail','AppStockOpnameRawMaterialDetailController@index');
		Route::get('stock_opname_raw_material_detail/download_pdf/{app_sales_id}','AppStockOpnameRawMaterialDetailController@download_pdf');
		Route::get('stock_opname_raw_material_detail/preview_pdf/{app_sales_id}','AppStockOpnameRawMaterialDetailController@preview_pdf');
		Route::post('stock_opname_raw_material_detail/save','AppStockOpnameRawMaterialDetailController@save');
		Route::get('stock_opname_raw_material_detail/edit/{app_sales_detail_id}','AppStockOpnameRawMaterialDetailController@edit');
		Route::get('stock_opname_raw_material_detail/render_lookup_suplier','AppStockOpnameRawMaterialDetailController@renderLookupSuplier');
		Route::get('stock_opname_raw_material_detail/render_lookup_raw_material','AppStockOpnameRawMaterialDetailController@renderLookupRawMaterial');
		Route::get('stock_opname_raw_material_detail/render_lookup_product','AppStockOpnameRawMaterialDetailController@renderLookupProduct');
		Route::post('stock_opname_raw_material_detail/update','AppStockOpnameRawMaterialDetailController@update');
		Route::post('stock_opname_raw_material_detail/update_header','AppStockOpnameRawMaterialDetailController@update_header');
		Route::post('stock_opname_raw_material_detail/destroy','AppStockOpnameRawMaterialDetailController@destroy');
});



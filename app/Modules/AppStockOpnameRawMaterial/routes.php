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
Route::group(['module' => 'AppStockOpnameRawMaterial', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockOpnameRawMaterial\Controllers'], function() {
    Route::post('stock_opname_raw_material','AppStockOpnameRawMaterialController@index');
		Route::get('stock_opname_raw_material','AppStockOpnameRawMaterialController@index');
		Route::post('stock_opname_raw_material/save','AppStockOpnameRawMaterialController@save');
		Route::get('stock_opname_raw_material/edit/{app_raw_material_id}','AppStockOpnameRawMaterialController@edit');
		Route::post('stock_opname_raw_material/update','AppStockOpnameRawMaterialController@update');
		Route::post('stock_opname_raw_material/destroy','AppStockOpnameRawMaterialController@destroy');
		Route::get('stock_opname_raw_material/render_lookup_suplier','AppStockOpnameRawMaterialController@renderLookupSuplier');
		Route::get('stock_opname_raw_material/render_lookup_category','AppStockOpnameRawMaterialController@renderLookupCategory');

});



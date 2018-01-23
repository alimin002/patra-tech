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

Route::group(['module' => 'AppStockRawMaterial', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockRawMaterial\Controllers'], function() {
    Route::post('stock_raw_material','AppStockRawMaterialController@index');
		Route::get('stock_raw_material','AppStockRawMaterialController@index');
		Route::post('stock_raw_material/save','AppStockRawMaterialController@save');
		Route::get('stock_raw_material/edit/{app_stock_raw_material_id}','AppStockRawMaterialController@edit');
		Route::get('stock_raw_material/render_lookup_raw_material','AppStockRawMaterialController@renderLookupStockRawMaterial');
		Route::post('stock_raw_material/update','AppStockRawMaterialController@update');
		Route::post('stock_raw_material/destroy','AppStockRawMaterialController@destroy');
		
});



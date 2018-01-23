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
Route::group(['module' => 'AppRawMaterial', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppRawMaterial\Controllers'], function() {
    Route::post('raw_material','AppRawMaterialController@index');
		Route::get('raw_material','AppRawMaterialController@index');
		Route::post('raw_material/save','AppRawMaterialController@save');
		Route::get('raw_material/edit/{app_raw_material_id}','AppRawMaterialController@edit');
		Route::post('raw_material/update','AppRawMaterialController@update');
		Route::post('raw_material/destroy','AppRawMaterialController@destroy');
		Route::get('raw_material/render_lookup_suplier','AppRawMaterialController@renderLookupSuplier');
		Route::get('raw_material/render_lookup_category','AppRawMaterialController@renderLookupCategory');

});



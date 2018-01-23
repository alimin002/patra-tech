<?php

Route::group(['module' => 'AppStockRawMaterial', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppStockRawMaterial\Controllers'], function() {

    Route::resource('app_stock_raw_material', 'AppStockRawMaterialController');

});

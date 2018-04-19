<?php

Route::group(['module' => 'AppStockOpnameRawMaterial', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockOpnameRawMaterial\Controllers'], function() {

    Route::resource('appStockOpnameRawMaterial', 'AppStockOpnameRawMaterialController');

});

<?php

Route::group(['module' => 'AppStockOpnameRawMaterial', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppStockOpnameRawMaterial\Controllers'], function() {

    Route::resource('appStockOpnameRawMaterial', 'AppStockOpnameRawMaterialController');

});

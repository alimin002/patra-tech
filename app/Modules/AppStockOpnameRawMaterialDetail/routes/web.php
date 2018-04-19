<?php

Route::group(['module' => 'AppStockOpnameRawMaterialDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockOpnameRawMaterialDetail\Controllers'], function() {

    Route::resource('appStockOpnameRawMaterialDetail', 'AppStockOpnameRawMaterialDetailController');

});

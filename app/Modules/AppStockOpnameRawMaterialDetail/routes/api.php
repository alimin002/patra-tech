<?php

Route::group(['module' => 'AppStockOpnameRawMaterialDetail', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppStockOpnameRawMaterialDetail\Controllers'], function() {

    Route::resource('appStockOpnameRawMaterialDetail', 'AppStockOpnameRawMaterialDetailController');

});

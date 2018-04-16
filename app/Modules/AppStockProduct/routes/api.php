<?php

Route::group(['module' => 'AppStockProduct', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppStockProduct\Controllers'], function() {

    Route::resource('appStockProduct', 'AppStockProductController');

});

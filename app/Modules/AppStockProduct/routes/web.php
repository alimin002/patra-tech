<?php

Route::group(['module' => 'AppStockProduct', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppStockProduct\Controllers'], function() {

    Route::resource('appStockProduct', 'AppStockProductController');

});

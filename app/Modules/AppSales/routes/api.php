<?php

Route::group(['module' => 'AppSales', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppSales\Controllers'], function() {

    Route::resource('AppSales', 'AppSalesController');

});

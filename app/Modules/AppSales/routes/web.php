<?php

Route::group(['module' => 'AppSales', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppSales\Controllers'], function() {

    Route::resource('sales', 'AppSalesController');
		Route::resource('salesxxx', 'AppSalesController');

});

<?php

Route::group(['module' => 'AppReportSales', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReportSales\Controllers'], function() {

    Route::resource('app_report_sales', 'AppReportSalesController');

});

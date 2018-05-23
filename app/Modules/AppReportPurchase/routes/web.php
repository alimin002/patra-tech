<?php

Route::group(['module' => 'AppReportPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReportPurchase\Controllers'], function() {

    Route::resource('appReportPurchase', 'AppReportPurchaseController');

});

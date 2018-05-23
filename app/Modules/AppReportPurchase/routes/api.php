<?php

Route::group(['module' => 'AppReportPurchase', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppReportPurchase\Controllers'], function() {

    Route::resource('appReportPurchase', 'AppReportPurchaseController');

});

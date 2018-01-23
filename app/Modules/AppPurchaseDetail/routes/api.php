<?php

Route::group(['module' => 'AppPurchaseDetail', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppPurchaseDetail\Controllers'], function() {

    Route::resource('app_purchase_detail', 'AppPurchaseDetailController');

});

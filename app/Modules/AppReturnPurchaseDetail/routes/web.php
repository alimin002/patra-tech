<?php

Route::group(['module' => 'AppReturnPurchaseDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReturnPurchaseDetail\Controllers'], function() {

    Route::resource('appReturnPurchaseDetail', 'AppReturnPurchaseDetailController');

});

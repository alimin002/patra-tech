<?php

Route::group(['module' => 'AppReturnPurchaseDetail', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppReturnPurchaseDetail\Controllers'], function() {

    Route::resource('appReturnPurchaseDetail', 'AppReturnPurchaseDetailController');

});

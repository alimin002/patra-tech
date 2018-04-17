<?php

Route::group(['module' => 'AppReturnPurchase', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppReturnPurchase\Controllers'], function() {

    Route::resource('AppReturnPurchase', 'AppReturnPurchaseController');

});

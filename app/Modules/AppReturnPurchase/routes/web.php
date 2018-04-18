<?php

Route::group(['module' => 'AppReturnPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppReturnPurchase\Controllers'], function() {

    Route::resource('AppReturnPurchase', 'AppReturnPurchaseController');

});

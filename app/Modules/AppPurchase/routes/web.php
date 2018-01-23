<?php

Route::group(['module' => 'AppPurchase', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppPurchase\Controllers'], function() {

    Route::resource('app_purchase', 'AppPurchaseController');

});

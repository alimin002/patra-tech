<?php

Route::group(['module' => 'AppPurchase', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppPurchase\Controllers'], function() {

    Route::resource('app_purchase', 'AppPurchaseController');

});

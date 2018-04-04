<?php

Route::group(['module' => 'AppSalesDetail', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppSalesDetail\Controllers'], function() {

    Route::resource('appSalesDetail', 'AppSalesDetailController');

});

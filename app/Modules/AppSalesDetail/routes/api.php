<?php

Route::group(['module' => 'AppSalesDetail', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppSalesDetail\Controllers'], function() {

    Route::resource('appSalesDetail', 'AppSalesDetailController');

});

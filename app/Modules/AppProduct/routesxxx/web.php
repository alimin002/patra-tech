<?php

Route::group(['module' => 'AppProduct', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppProduct\Controllers'], function() {

    Route::resource('app_product', 'AppProductController');

});

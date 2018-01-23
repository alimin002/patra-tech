<?php

Route::group(['module' => 'AppProduct', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppProduct\Controllers'], function() {

    Route::resource('app_product', 'AppProductController');

});

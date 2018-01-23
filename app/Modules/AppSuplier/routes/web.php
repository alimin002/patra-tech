<?php

Route::group(['module' => 'AppSuplier', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppSuplier\Controllers'], function() {

    Route::resource('app_suplier', 'AppSuplierController');

});

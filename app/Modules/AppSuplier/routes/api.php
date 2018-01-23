<?php

Route::group(['module' => 'AppSuplier', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppSuplier\Controllers'], function() {

    Route::resource('app_suplier', 'AppSuplierController');

});

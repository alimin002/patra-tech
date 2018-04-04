<?php

Route::group(['module' => 'Tes', 'middleware' => ['web'], 'namespace' => 'App\Modules\Tes\Controllers'], function() {

    Route::resource('tes', 'TesController');

});

<?php

Route::group(['module' => 'Tes', 'middleware' => ['api'], 'namespace' => 'App\Modules\Tes\Controllers'], function() {

    Route::resource('tes', 'TesController');

});

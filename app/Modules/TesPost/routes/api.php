<?php

Route::group(['module' => 'TesPost', 'middleware' => ['api'], 'namespace' => 'App\Modules\TesPost\Controllers'], function() {

    Route::resource('TesPost', 'TesPostController');

});

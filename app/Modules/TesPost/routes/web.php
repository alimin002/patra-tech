<?php

Route::group(['module' => 'TesPost', 'middleware' => ['web'], 'namespace' => 'App\Modules\TesPost\Controllers'], function() {
	Route::get('form','TesPostController@index');
	Route::post('save','TesPostController@save');
	
    Route::resource('TesPost', 'TesPostController');

});

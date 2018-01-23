<?php

Route::group(['module' => 'AppRawMaterial', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppRawMaterial\Controllers'], function() {

    Route::resource('app_raw_material', 'AppRawMaterialController');

});

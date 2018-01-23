<?php

Route::group(['module' => 'AppRawMaterial', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppRawMaterial\Controllers'], function() {

    Route::resource('app_raw_material', 'AppRawMaterialController');

});

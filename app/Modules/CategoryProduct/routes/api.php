<?php

Route::group(['module' => 'CategoryProduct', 'middleware' => ['api'], 'namespace' => 'App\Modules\CategoryProduct\Controllers'], function() {

    Route::resource('category_product', 'CategoryProductController');

});

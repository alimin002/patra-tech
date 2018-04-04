<?php

Route::group(['module' => 'CategoryProduct', 'middleware' => ['web'], 'namespace' => 'App\Modules\CategoryProduct\Controllers'], function() {

    Route::resource('category_product', 'CategoryProductController');

});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	Route::group(['module' => 'CategoryProduct', 'middleware' => ['web'], 'namespace' => 'App\Modules\CategoryProduct\Controllers'], function() {
  Route::post('category_product','CategoryProductController@index');
	Route::post('category_product/save','CategoryProductController@save');
	Route::post('test_post','TestPostController@test_post');
});



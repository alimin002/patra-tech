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


Route::group(['module' => 'AppProduct', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppProduct\Controllers'], function() {
    Route::post('product','AppProductController@index');
		Route::get('product','AppProductController@index');
		Route::post('product/save','AppProductController@save');
		Route::get('product/edit/{app_product_id}','AppProductController@edit');
		Route::post('product/update','AppProductController@update');
		Route::post('product/destroy','AppProductController@destroy');
});



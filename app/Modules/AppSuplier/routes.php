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
Route::group(['module' => 'AppSuplier', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppSuplier\Controllers'], function(){
    Route::get('suplier','AppSuplierController@index');
		Route::post('suplier','AppSuplierController@index');
		Route::post('suplier/save','AppSuplierController@save');
		Route::get('suplier/edit/{app_suplier_id}','AppSuplierController@edit');
		Route::post('suplier/update','AppSuplierController@update');
		Route::post('suplier/destroy','AppSuplierController@destroy');
});



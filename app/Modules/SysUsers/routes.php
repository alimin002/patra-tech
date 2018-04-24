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
Route::group(['module' => 'SysUsers', 'middleware' => ['web'], 'namespace' => 'App\Modules\SysUsers\Controllers'], function(){
    Route::get('sys_user','SysUsersController@index');
		Route::post('sys_user','SysUsersController@index');
		Route::post('sys_user/save','SysUsersController@save');
		Route::get('sys_user/edit/{app_sys_user_id}','SysUsersController@edit');
		Route::post('sys_user/update','SysUsersController@update');
		Route::post('sys_user/destroy','SysUsersController@destroy');
});


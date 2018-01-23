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
Route::get('/','login@displayLogin');
Route::get('login','login@checkLogin');
Route::POST('do_login','login@displayHome');
Route::get('logout','login@doLogout');




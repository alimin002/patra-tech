<?php

Route::group(['module' => 'SysUsers', 'middleware' => ['web'], 'namespace' => 'App\Modules\SysUsers\Controllers'], function() {

    Route::resource('sys_users', 'SysUsersController');

});

<?php

Route::group(['module' => 'SysUsers', 'middleware' => ['api'], 'namespace' => 'App\Modules\SysUsers\Controllers'], function() {

    Route::resource('sys_users', 'SysUsersController');

});

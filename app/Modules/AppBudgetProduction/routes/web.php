<?php

Route::group(['module' => 'AppBudgetProduction', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppBudgetProduction\Controllers'], function() {

    Route::resource('app_budget_production', 'AppBudgetProductionController');

});

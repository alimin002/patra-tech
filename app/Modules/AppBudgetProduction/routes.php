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
Route::group(['module' => 'AppBudgetProduction', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppBudgetProduction\Controllers'], function(){
    Route::get('budget_production','AppBudgetProductionController@index');
		Route::post('budget_production','AppBudgetProductionController@index');
		Route::post('budget_production/save','AppBudgetProductionController@save');
		Route::get('budget_production/edit/{app_budget_production_id}','AppBudgetProductionController@edit');
		Route::get('budget_production/render_lookup_suplier','AppBudgetProductionController@renderLookupSuplier');
		Route::post('budget_production/update','AppBudgetProductionController@update');
		Route::post('budget_production/destroy','AppBudgetProductionController@destroy');
		Route::post('budget_production/approve_prediction','AppBudgetProductionController@approve_prediction');
});



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
Route::group(['module' => 'AppCostPredictor', 'middleware' => ['web'], 'namespace' => 'App\Modules\AppCostPredictor\Controllers'], function(){
    Route::get('cost_predictor','AppCostPredictorController@index');
		Route::post('cost_predictor','AppCostPredictorController@index');
		Route::post('cost_predictor/save','AppCostPredictorController@save');
		Route::get('cost_predictor/edit/{app_product_composition_id}','AppCostPredictorController@edit');
		Route::post('cost_predictor/update','AppCostPredictorController@update');
		Route::post('cost_predictor/destroy','AppCostPredictorController@destroy');
		Route::get('cost_predictor/stock_out_prediction/{app_sales_id}','AppCostPredictorController@stock_out_prediction');

});



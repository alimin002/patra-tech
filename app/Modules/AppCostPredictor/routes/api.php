<?php

Route::group(['module' => 'AppCostPredictor', 'middleware' => ['api'], 'namespace' => 'App\Modules\AppCostPredictor\Controllers'], function() {

    Route::resource('app_cost_predictor', 'AppCostPredictorController');

});

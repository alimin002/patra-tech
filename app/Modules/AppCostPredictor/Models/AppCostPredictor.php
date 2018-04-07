<?php

namespace App\Modules\AppCostPredictor\Models;

use Illuminate\Database\Eloquent\Model;

class AppCostPredictor extends Model {
  //
	protected $table 				= "app_product_composition";
	protected $primaryKey 	= "app_product_composition_id";
	protected $guarded 			= array('app_product_composition_id');
	public $timestamps 			= false;

}

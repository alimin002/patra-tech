<?php

namespace App\Modules\AppStockRawMaterial\Models;

use Illuminate\Database\Eloquent\Model;
class AppStockRawMaterial extends Model {
  //
	protected $table 				= "app_stock_raw_material";
	protected $primaryKey 	= "app_stock_raw_material";
	protected $guarded 			= array('app_stock_raw_material');
	public $timestamps 			= false;
}

<?php

namespace App\Modules\AppStockOpnameRawMaterial\Models;

use Illuminate\Database\Eloquent\Model;

class AppStockOpnameRawMaterial extends Model {
	//
	protected $table 				= "app_stock_opname_raw_material";
	protected $primaryKey 	= "app_stock_opname_raw_material_id";
	protected $guarded 			= array('app_stock_opname_raw_material_id');
	public $timestamps 			= false;

}

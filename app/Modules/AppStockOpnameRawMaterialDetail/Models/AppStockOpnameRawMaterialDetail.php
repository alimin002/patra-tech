<?php

namespace App\Modules\AppStockOpnameRawMaterialDetail\Models;

use Illuminate\Database\Eloquent\Model;

class AppStockOpnameRawMaterialDetail extends Model {

    //
	protected $table 				= "app_stock_opname_raw_material_detail";
	protected $primaryKey 	= "app_stock_opname_raw_material_detail_id";
	protected $guarded 			= array('app_stock_opname_raw_material_detail_id');
	public $timestamps 			= false;

}

<?php

namespace App\Modules\AppReturnPurchaseDetail\Models;

use Illuminate\Database\Eloquent\Model;

class AppReturnPurchaseDetail extends Model {

	//
	protected $table 				= "app_return_purchase_detail";
	protected $primaryKey 	= "app_return_purchase_detail_id";
	protected $guarded 			= array('app_return_purchase_detail_id');
	public $timestamps 			= false;

}

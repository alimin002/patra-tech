<?php

namespace App\Modules\AppPurchaseDetail\Models;

use Illuminate\Database\Eloquent\Model;

class AppPurchaseDetail extends Model{
	protected $table 				= "app_purchase_detail";
	protected $primaryKey 	= "app_purchase_detail_id";
	protected $guarded 			= array('app_purchase_detail_id');
	public $timestamps 			= false;
}

<?php

namespace App\Modules\AppPurchase\Models;

use Illuminate\Database\Eloquent\Model;

class AppPurchase extends Model {

    //
	protected $table 				= "app_purchase";
	protected $primaryKey 	= "app_purchase_id";
	protected $guarded 			= array('app_purchase_id');
	public $timestamps 			= false;

}

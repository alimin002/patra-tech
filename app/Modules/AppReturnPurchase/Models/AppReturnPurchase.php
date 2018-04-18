<?php

namespace App\Modules\AppReturnPurchase\Models;

use Illuminate\Database\Eloquent\Model;
use app\Providers\Lookup;

class AppReturnPurchase extends Model {

    //
		    //
	protected $table 				= "app_return_purchase";
	protected $primaryKey 	= "app_return_purchase_id";
	protected $guarded 			= array('app_return_purchase_id');
	public $timestamps 			= false;


}

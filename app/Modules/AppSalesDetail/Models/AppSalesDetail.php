<?php

namespace App\Modules\AppSalesDetail\Models;

use Illuminate\Database\Eloquent\Model;

class AppSalesDetail extends Model {

    //
	protected $table 				= "app_sales_detail";
	protected $primaryKey 	= "app_sales_detail_id";
	protected $guarded 			= array('app_sales_detail_id');
	public $timestamps 			= false;

}

<?php

namespace App\Modules\AppSales\Models;

use Illuminate\Database\Eloquent\Model;

class AppSales extends Model {

  //
	protected $table 				= "app_sales";
	protected $primaryKey 	= "app_sales_id";
	protected $guarded 			= array('app_sales_id');
	public $timestamps 			= false;

}

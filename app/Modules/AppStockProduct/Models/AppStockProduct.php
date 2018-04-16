<?php

namespace App\Modules\AppStockProduct\Models;

use Illuminate\Database\Eloquent\Model;

class AppStockProduct extends Model{
  //
	protected $table 						= "app_stock";
	protected $primaryKey 	    = "app_stock_id";
	protected $guarded 			    = array('app_stock');
	public $timestamps 			    = false;

}

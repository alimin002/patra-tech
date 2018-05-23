<?php

namespace App\Modules\AppProduct\Models;

use Illuminate\Database\Eloquent\Model;
class AppProduct extends Model {

    //
	protected $table 				= "app_products";
	protected $primaryKey 	= "app_product_id";
	protected $guarded 			= array('app_product_id');
	public $timestamps 			= false;


}

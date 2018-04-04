<?php

namespace App\Modules\AppProduct\Models;

use Illuminate\Database\Eloquent\Model;
class AppProduct extends Model {

    //
	protected $table 				= "app_products";
	protected $primaryKey 	= "app_products_id";
	protected $guarded 			= array('app_products_id');
	public $timestamps 			= false;


}

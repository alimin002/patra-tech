<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class app_category_product extends Model
{
    //
	protected $table 				= "app_category";
	protected $primaryKey 	= "app_category_id";
	protected $guarded 			= array('app_category_id');
	public $timestamps 			= false;
}

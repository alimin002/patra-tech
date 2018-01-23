<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class app_category_raw_material extends Model
{
    //
	protected $table 				= "app_category_raw_material";
	protected $primaryKey 	= "app_category_raw_material_id";
	protected $guarded 			= array('app_category_raw_material_id');
	public $timestamps 			= false;
}

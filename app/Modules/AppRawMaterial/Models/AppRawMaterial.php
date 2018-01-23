<?php

namespace App\Modules\AppRawMaterial\Models;

use Illuminate\Database\Eloquent\Model;
class AppRawMaterial extends Model {

    //
	protected $table 				= "app_raw_material";
	protected $primaryKey 	= "app_raw_material_id";
	protected $guarded 			= array('app_raw_material_id');
	public $timestamps 			= false;

}

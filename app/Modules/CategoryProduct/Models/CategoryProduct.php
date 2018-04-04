<?php

namespace App\Modules\CategoryProduct\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model {

    //
	protected $table 				= "app_category";
	protected $primaryKey 			= "app_category_id";
	protected $guarded 				= array('app_category_id');
	public $timestamps 				= false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class app_suplier extends Model
{
  //
	protected $table 				= "app_suplier";
	protected $primaryKey 	= "app_suplier_id";
	protected $guarded 			= array('app_suplier_id');
	public $timestamps 			= false;
}

<?php

namespace App\Modules\SysUsers\Models;

use Illuminate\Database\Eloquent\Model;

class SysUsers extends Model {

  //
	protected $table 				= "sys_users";
	protected $primaryKey 	= "sys_user_id";
	protected $guarded 			= array('sys_user_id');
	public $timestamps 			= false;

}

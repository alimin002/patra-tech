<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sys_users extends Model
{
  //
	protected $table 				= "sys_users";
	protected $primaryKey 	= "sys_user_id";
	protected $guarded 			= array('sys_user_id');
	public $timestamps 			= false;
}

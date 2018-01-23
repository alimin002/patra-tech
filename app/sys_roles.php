<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sys_roles extends Model
{
    //
		 //
	protected $table 				= "sys_roles";
	protected $primaryKey 	= "sys_roles_id";
	protected $guarded 			= array('sys_roles_id');
	public $timestamps 			= false;
}

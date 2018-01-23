<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SysUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
				 Schema::create('sys_users', function (Blueprint $table) {
            $table->increments('sys_user_id');
            $table->string('username');
            $table->integer('sys_roles_id');
						$table->string('occupation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
				Schema::drop('sys_users');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPasswordToSysUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

    Schema::table('sys_users', function($table) {
        $table->string('password');
    });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
		{
				Schema::table('sys_users', function($table) {
						$table->dropColumn('password');
				});
		}
}

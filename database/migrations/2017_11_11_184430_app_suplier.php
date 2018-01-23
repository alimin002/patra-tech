<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppSuplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_suplier', function (Blueprint $table) {
            $table->increments('app_suplier_id');
            $table->string('name');
						$table->string('addres');
						$table->string('telephone_number');
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
				Schema::drop('sys_suplier');

    }
}

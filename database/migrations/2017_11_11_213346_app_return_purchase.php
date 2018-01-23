<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppReturnPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_return_purchase', function (Blueprint $table){
            $table->increments('app_return_purchase_id');
						$table->integer('suplier_id');
						$table->integer('sys_user_id');
						$table->string('return_purchase_number');
						$table->date('return_date');//no nota,kwitansi,etc
						$table->string('return_reason');	
						$table->string('description');						
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
				Schema::drop('app_return_purchase');
    }
}

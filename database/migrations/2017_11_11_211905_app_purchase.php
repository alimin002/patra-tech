<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppPurchase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
				//
				 Schema::create('app_purchase', function (Blueprint $table){
            $table->increments('app_purchase_id');
						$table->integer('app_suplier_id');
						$table->integer('sys_user_id');
						$table->string('purchase_number');
						$table->date('purchase_date');
						$table->text('description');
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
				Schema::drop('app_purchase');

    }
}

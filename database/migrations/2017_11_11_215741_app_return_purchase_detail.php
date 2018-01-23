<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppReturnPurchaseDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_return_purchase_detail', function (Blueprint $table){
            $table->increments('app_return_purchase_detail_id');
						$table->integer('app_return_purchase_id');
						$table->integer('app_product_id');
							
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
				Schema::drop('app_return_purchase_detail');
    }
}

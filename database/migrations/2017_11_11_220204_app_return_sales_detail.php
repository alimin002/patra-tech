<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppReturnSalesDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
				//
				 Schema::create('app_return_sales_detail', function (Blueprint $table){
            $table->increments('app_return_sales_detail_id');
						$table->integer('app_return_sales_id');
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
				Schema::drop('app_return_sales_detail');
    }
}

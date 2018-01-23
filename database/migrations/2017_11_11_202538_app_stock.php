<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
				//
				 Schema::create('app_stock', function (Blueprint $table) {
            $table->increments('app_stock_id');
						$table->integer('app_product_id');//kg,piece,pack etc
						$table->integer('stock');
						$table->integer('description');
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
				Schema::drop('app_stock');
    }
}

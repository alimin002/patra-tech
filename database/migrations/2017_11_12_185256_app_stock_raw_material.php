<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppStockRawMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_stock_raw_material', function (Blueprint $table) {
            $table->increments('app_stock_raw_material_id');
						$table->integer('app_raw_material_id');//kg,piece,pack etc
						$table->integer('stock');//
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
				Schema::drop('app_stock_raw_material');
    }
}

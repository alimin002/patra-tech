<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_products', function (Blueprint $table) {
            $table->increments('app_product_id');
            $table->string('name');
						$table->integer('app_suplier_id');//kg,piece,pack etc
						$table->integer('app_category_id');
						$table->string('unit');
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
				Schema::drop('app_products');

    }
}

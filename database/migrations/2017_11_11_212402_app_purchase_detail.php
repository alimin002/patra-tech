<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppPurchaseDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				Schema::create('app_purchase_detail', function (Blueprint $table){
            $table->increments('app_purchase_detail_id');
						$table->integer('app_purchase_id');
						$table->integer('app_raw_material_id');
						$table->integer('qty');
						$table->integer('sub_total');
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
				Schema::drop('app_purchase_detail');

    }
}

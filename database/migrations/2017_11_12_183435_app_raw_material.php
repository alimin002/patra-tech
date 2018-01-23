<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppRawMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_raw_material', function (Blueprint $table) {
            $table->increments('app_raw_material_id');
            $table->string('name');
						$table->integer('app_suplier_id');
						$table->integer('app_category_raw_material_id');
						$table->string('unit');
						$table->float('unit_price');
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
				Schema::drop('app_raw_material');

    }
}

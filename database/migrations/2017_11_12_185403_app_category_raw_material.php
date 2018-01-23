<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppCategoryRawMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_category_raw_material', function (Blueprint $table) {
            $table->increments('app_category_raw_material_id');
            $table->string('name');
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
				Schema::drop('app_category_raw_material');

    }
}

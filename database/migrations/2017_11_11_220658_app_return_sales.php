<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppReturnSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_return_sales', function (Blueprint $table){
            $table->increments('app_return_sales_id');
						$table->integer('customer_id');
						$table->integer('sys_user_id');
						$table->string('return_sales_number');
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
				Schema::drop('app_return_sales');
    }
}

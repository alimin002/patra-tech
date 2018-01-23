<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
				//
				 Schema::create('app_sales', function (Blueprint $table){
						$table->increments('app_sales_id');
						$table->string('invoice_number');
						$table->date('sale_date');
            $table->integer('customer_id');					
            $table->integer('sys_user_id');
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
				Schema::drop('app_sales');

    }
}

<?php

use Illuminate\Database\Seeder;

class app_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
				DB::table('app_products')->insert([
						[
								'name' 								=> 'Tepung Terigu',
								'unit' 								=> 'Karung',
						],
						[
								'name' 								=> 'Backing Soda',
								'unit' 								=> 'Botol',
						],
						[
								'name' 								=> 'Gula Pasir',
								'unit' 								=>	'Karung',
						],
						[
								'name' 								=> 'Pewarna Makanan',
								'unit'   							=> 'Kilogram'
						],
						[
								'name' 								=> 'Cokelat',
								'unit' 								=>	'Karung',
						]
					]				
				);
    }
}

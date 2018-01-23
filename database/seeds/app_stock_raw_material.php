<?php

use Illuminate\Database\Seeder;

class app_stock_raw_material extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
				DB::table('app_stock_raw_material')->insert([
						[
								'app_raw_material_id' 	=> '1',
								'stock' 								=> '3',
						],
						[
								'app_raw_material_id' 	=> '2',
								'stock' 								=> '2',
						]
						,
						[
								'app_raw_material_id' 	=> '3',
								'stock' 								=> '3',
						]
						,
						[
								'app_raw_material_id' 	=> '4',
								'stock' 								=> '4',
						]
						,
						[
								'app_raw_material_id' 	=> '5',
								'stock' 								=> '3',
						]
						,
						[
								'app_raw_material_id' 	=> '6',
								'stock' 								=> '7',
						]
					]				
				);
    }
}

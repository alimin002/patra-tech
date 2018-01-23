<?php

use Illuminate\Database\Seeder;

class app_category_raw_material extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
				DB::table('app_category_raw_material')->insert([
					[
							'name' => 'Bahan Pokok',          
					],
					[
							'name' => 'Bahan Tambahan',         
					]	
				]				
				);
    }
}

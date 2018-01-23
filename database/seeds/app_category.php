<?php

use Illuminate\Database\Seeder;

class app_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
				DB::table('app_category')->insert([
					[
							'name' => 'Bahan Pokok'          
					],
					[
							'name' => 'Bahan Tambahan'          
					]	
				]				
				);
				
		}
}

<?php

use Illuminate\Database\Seeder;

class app_suplier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {     
			 DB::table('app_suplier')->insert([
						[
								'name' 								=> 'Abdullah',
								'addres' 						=>	'Bandung',
								'telephone_number'   	=> '087584375'
						],
						[
								'name' 								=> 'Jhony',
								'addres' 						=>	'Bandung',
								'telephone_number'   	=> '087584375'
						],
						[
								'name' 								=> 'Anita',
								'addres' 						=>	'Semarang',
								'telephone_number'   	=> '087584375'
						],
						[
								'name' 								=> 'Mahmud',
								'addres' 						=>	'Solo',
								'telephone_number'   	=> '087584375'
						],
						[
								'name' 								=> 'Antoni',
								'addres' 						=>	'Tangerang',
								'telephone_number'   	=> '087584375'
						]
					]				
				);
		}
}

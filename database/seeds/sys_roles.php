<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class sys_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
				 DB::table('sys_roles')->insert(
				 [
						[
								'name' => 'admin',
						],
						[
								'name' => 'superadmin',
						],
						[
								'name' => 'manager',
						]	
					]					
				 );
    }
		
}

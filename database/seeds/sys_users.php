<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class sys_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
		public function run()
    {
     
				DB::table('sys_users')->insert([
				[
            'username' => 'Abdullar',
            'sys_roles_id' =>1,
            'occupation'   => 'manajer',
						'password'     => bcrypt('secret'),
        ],
				[
            'username' => 'Anton',
            'sys_roles_id' =>2,
            'occupation' => 'admin',
						'password'     => bcrypt('secret'),
        ]
				,
				[
            'username' => 'Fauzan',
            'sys_roles_id' =>3,
            'occupation' => 'admin2',
						'password'     => bcrypt('secret'),
        ]
				,
				[
            'username' => 'Andi',
            'sys_roles_id' =>4,
            'occupation' => 'Kepala Gudang',
						'password'     => bcrypt('secret'),
        ]
				,
				[
            'username' => 'siska',
            'sys_roles_id' =>5,
            'occupation' => 'Accounting',
						'password'     => bcrypt('secret'),
        ]	
			]				
				);
				
		}
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'fb_id' => '1031392066904720',
				'name' => 'Pok Aha',
				'email' => 'pok_yura@hotmail.com',
				'lang' => 'th',
				'created_at' => '2016-02-09 23:33:22',
				'updated_at' => '2016-02-09 23:33:22',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

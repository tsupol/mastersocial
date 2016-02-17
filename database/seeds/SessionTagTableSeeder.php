<?php

use Illuminate\Database\Seeder;

class SessionTagTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('session_tag')->delete();
        
		\DB::table('session_tag')->insert(array (
			0 => 
			array (
				'id' => 1,
				'session_id' => 2,
				'tag_id' => 1,
				'created_at' => '2016-02-15 22:06:38',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'session_id' => 2,
				'tag_id' => 2,
				'created_at' => '2016-02-15 22:06:38',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'session_id' => 2,
				'tag_id' => 5,
				'created_at' => '2016-02-15 22:06:38',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'session_id' => 2,
				'tag_id' => 6,
				'created_at' => '2016-02-15 22:06:38',
				'updated_at' => '0000-00-00 00:00:00',
			),
			4 => 
			array (
				'id' => 5,
				'session_id' => 4,
				'tag_id' => 1,
				'created_at' => '2016-02-16 17:54:44',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 => 
			array (
				'id' => 6,
				'session_id' => 4,
				'tag_id' => 2,
				'created_at' => '2016-02-16 17:54:44',
				'updated_at' => '0000-00-00 00:00:00',
			),
			6 => 
			array (
				'id' => 7,
				'session_id' => 4,
				'tag_id' => 5,
				'created_at' => '2016-02-16 17:54:44',
				'updated_at' => '0000-00-00 00:00:00',
			),
			7 => 
			array (
				'id' => 8,
				'session_id' => 4,
				'tag_id' => 6,
				'created_at' => '2016-02-16 17:54:44',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}

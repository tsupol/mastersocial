<?php

use Illuminate\Database\Seeder;

class SessionTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('session')->delete();
        
		\DB::table('session')->insert(array (
			0 => 
			array (
				'id' => 1,
				'tid' => 't_mid.1453826055296:6726c8564763d76e99',
				'count_time' => 9972,
				'count_message_page' => 8,
				'count_message_customer' => 10,
				'mid' => 'm_mid.1454424361898:4946a8f2fd3bfab476',
				'start_chat_id' => 39,
				'end_chat_id' => 22,
				'start_chat_at' => '2016-01-26 16:34:15',
				'end_chat_at' => '2016-02-02 14:46:01',
				'status_id' => 2,
				'created_at' => '2016-02-15 18:57:10',
				'updated_at' => '2016-02-15 18:57:10',
			),
			1 => 
			array (
				'id' => 2,
				'tid' => 't_mid.1453826055296:6726c8564763d76e99',
				'count_time' => 12937,
				'count_message_page' => 4,
				'count_message_customer' => 9,
				'mid' => 'm_mid.1455200574351:46193277fc06ad3d17',
				'start_chat_id' => 1,
				'end_chat_id' => 9,
				'start_chat_at' => '2016-02-02 14:46:01',
				'end_chat_at' => '2016-02-11 14:22:54',
				'status_id' => 3,
				'created_at' => '2016-02-15 18:57:22',
				'updated_at' => '2016-02-15 18:57:22',
			),
		));
	}

}

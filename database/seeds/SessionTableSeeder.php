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
				'tid' => 't_mid.1453826395510:58e72fa4db22012854',
				'count_time' => 0,
				'count_message_page' => 0,
				'count_message_customer' => 0,
				'mid' => '',
				'start_chat_id' => 0,
				'end_chat_id' => 0,
				'start_chat_at' => '0000-00-00 00:00:00',
				'end_chat_at' => '0000-00-00 00:00:00',
				'status_id' => 1,
				'created_at' => '2016-02-15 21:58:39',
				'updated_at' => '2016-02-15 21:58:39',
			),
			1 => 
			array (
				'id' => 2,
				'tid' => 't_mid.1453826055296:6726c8564763d76e99',
				'count_time' => 9972,
				'count_message_page' => 8,
				'count_message_customer' => 10,
				'mid' => 'm_mid.1454424361898:4946a8f2fd3bfab476',
				'start_chat_id' => 41,
				'end_chat_id' => 24,
				'start_chat_at' => '2016-01-26 16:34:15',
				'end_chat_at' => '2016-02-02 14:46:01',
				'status_id' => 2,
				'created_at' => '2016-02-15 22:38:14',
				'updated_at' => '2016-02-15 22:38:14',
			),
			2 => 
			array (
				'id' => 3,
				'tid' => 't_mid.1455190849842:b397a7b7e4f2209e61',
				'count_time' => 0,
				'count_message_page' => 0,
				'count_message_customer' => 0,
				'mid' => '',
				'start_chat_id' => 0,
				'end_chat_id' => 0,
				'start_chat_at' => '0000-00-00 00:00:00',
				'end_chat_at' => '0000-00-00 00:00:00',
				'status_id' => 1,
				'created_at' => '2016-02-15 21:58:47',
				'updated_at' => '2016-02-15 21:58:47',
			),
			3 => 
			array (
				'id' => 4,
				'tid' => 't_mid.1453826055296:6726c8564763d76e99',
				'count_time' => 12935,
				'count_message_page' => 4,
				'count_message_customer' => 9,
				'mid' => 'm_mid.1455200574351:46193277fc06ad3d17',
				'start_chat_id' => 59,
				'end_chat_id' => 47,
				'start_chat_at' => '2016-02-02 14:47:40',
				'end_chat_at' => '2016-02-11 14:22:54',
				'status_id' => 3,
				'created_at' => '2016-02-16 17:54:58',
				'updated_at' => '2016-02-16 17:54:58',
			),
			4 => 
			array (
				'id' => 5,
				'tid' => 't_mid.1453826055296:6726c8564763d76e99',
				'count_time' => 0,
				'count_message_page' => 0,
				'count_message_customer' => 0,
				'mid' => '',
				'start_chat_id' => 0,
				'end_chat_id' => 0,
				'start_chat_at' => '0000-00-00 00:00:00',
				'end_chat_at' => '0000-00-00 00:00:00',
				'status_id' => 1,
				'created_at' => '2016-02-26 18:25:56',
				'updated_at' => '2016-02-26 18:25:56',
			),
		));
	}

}

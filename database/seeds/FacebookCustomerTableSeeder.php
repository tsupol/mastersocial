<?php

use Illuminate\Database\Seeder;

class FacebookCustomerTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('facebook_customer')->delete();
        
		\DB::table('facebook_customer')->insert(array (
			0 => 
			array (
				'id' => 1,
				'from_id' => '180617342300780',
				'from_name' => 'Komsan Krasaesin',
				'tid' => 't_mid.1453826055296:6726c8564763d76e99',
				'page_id' => '919082208176684',
				'snippet' => '30',
				'lasted_at' => '2016-02-11 14:22:54',
				'status' => 1,
				'created_at' => '2016-02-16 17:54:28',
				'updated_at' => '2016-02-16 17:54:28',
			),
			1 => 
			array (
				'id' => 2,
				'from_id' => '896925473760184',
				'from_name' => 'Tab Lnw',
				'tid' => 't_mid.1453826395510:58e72fa4db22012854',
				'page_id' => '919082208176684',
				'snippet' => '12',
				'lasted_at' => '2016-02-10 13:26:31',
				'status' => 1,
				'created_at' => '2016-02-11 21:26:19',
				'updated_at' => '2016-02-11 21:26:19',
			),
			2 => 
			array (
				'id' => 3,
				'from_id' => '127835130935864',
				'from_name' => 'Fbpok Chala',
				'tid' => 't_mid.1455190849842:b397a7b7e4f2209e61',
				'page_id' => '919082208176684',
				'snippet' => '2',
				'lasted_at' => '2016-02-11 13:02:08',
				'status' => 1,
				'created_at' => '2016-02-11 22:56:01',
				'updated_at' => '2016-02-11 22:56:01',
			),
		));
	}

}

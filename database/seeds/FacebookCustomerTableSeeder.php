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
				'id' => 11,
				'fb_uid' => 't_mid.1455190849842:b397a7b7e4f2209e61',
				'fb_uname' => 'Fbpok Chala',
				'status' => 1,
				'created_at' => '2016-02-11 18:51:43',
				'updated_at' => '2016-02-11 18:51:43',
			),
			1 => 
			array (
				'id' => 12,
				'fb_uid' => 't_mid.1453826055296:6726c8564763d76e99',
				'fb_uname' => 'Komsan Krasaesin',
				'status' => 1,
				'created_at' => '2016-02-11 18:51:44',
				'updated_at' => '2016-02-11 18:51:44',
			),
			2 => 
			array (
				'id' => 13,
				'fb_uid' => 't_mid.1453826395510:58e72fa4db22012854',
				'fb_uname' => 'Tab Lnw',
				'status' => 1,
				'created_at' => '2016-02-11 18:51:45',
				'updated_at' => '2016-02-11 18:51:45',
			),
			3 => 
			array (
				'id' => 14,
				'fb_uid' => 't_mid.1455190849842:b397a7b7e4f2209e61',
				'fb_uname' => 'Fbpok Chala',
				'status' => 1,
				'created_at' => '2016-02-11 18:52:56',
				'updated_at' => '2016-02-11 18:52:56',
			),
			4 => 
			array (
				'id' => 15,
				'fb_uid' => 't_mid.1453826055296:6726c8564763d76e99',
				'fb_uname' => 'Komsan Krasaesin',
				'status' => 1,
				'created_at' => '2016-02-11 18:53:00',
				'updated_at' => '2016-02-11 18:53:00',
			),
			5 => 
			array (
				'id' => 16,
				'fb_uid' => 't_mid.1453826395510:58e72fa4db22012854',
				'fb_uname' => 'Tab Lnw',
				'status' => 1,
				'created_at' => '2016-02-11 18:53:05',
				'updated_at' => '2016-02-11 18:53:05',
			),
		));
	}

}

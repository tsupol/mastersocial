<?php

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('purchases')->delete();
        
		\DB::table('purchases')->insert(array (
			0 => 
			array (
				'id' => 1,
				'price' => '1930.00',
				'discount' => '360.00',
				'hn' => 5500300,
				'sale2_id' => 0,
				'sale_id' => 7,
				'doctor_id' => 9,
				'status' => 0,
				'created_at' => '2015-12-08 14:28:38',
				'updated_at' => '2015-12-08 16:16:01',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

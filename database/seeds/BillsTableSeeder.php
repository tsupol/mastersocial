<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('bills')->delete();
        
		\DB::table('bills')->insert(array (
			0 => 
			array (
				'id' => 1,
				'code' => '590100001',
				'purchase_id' => 0,
				'customer_id' => 40,
				'hn' => 5500040,
				'branch_id' => 1,
				'show_report' => 1,
				'created_at' => '2016-01-08 15:32:15',
				'updated_at' => '2016-01-08 15:32:15',
				'created_by' => 1,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

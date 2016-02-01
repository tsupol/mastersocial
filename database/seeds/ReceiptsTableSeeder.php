<?php

use Illuminate\Database\Seeder;

class ReceiptsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('receipts')->delete();
        
		\DB::table('receipts')->insert(array (
			0 => 
			array (
				'id' => 1,
				'code' => '581200001',
				'cash' => '500.00',
				'credit' => '0.00',
				'transfer' => '0.00',
				'total' => '500.00',
				'action_type' => 2,
				'purchase_id' => 1,
				'status' => 0,
				'created_at' => '2015-12-08 14:29:41',
				'updated_at' => '2015-12-08 14:29:41',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'code' => '581200002',
				'cash' => '500.00',
				'credit' => '0.00',
				'transfer' => '0.00',
				'total' => '500.00',
				'action_type' => 2,
				'purchase_id' => 1,
				'status' => 0,
				'created_at' => '2015-12-08 16:16:01',
				'updated_at' => '2015-12-08 16:16:01',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

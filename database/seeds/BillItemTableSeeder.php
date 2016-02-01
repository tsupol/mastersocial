<?php

use Illuminate\Database\Seeder;

class BillItemTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('bill_item')->delete();
        
		\DB::table('bill_item')->insert(array (
			0 => 
			array (
				'id' => 1,
				'bill_id' => 1,
				'item_id' => 6,
				'package_id' => 10,
				'purchase_id' => 132,
				'procedure_id' => 7,
				'branch_id' => 1,
				'amount' => 2,
				'show_report' => 1,
				'created_at' => '2016-01-08 15:32:15',
				'updated_at' => '2016-01-08 15:32:15',
				'created_by' => 1,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'bill_id' => 1,
				'item_id' => 1,
				'package_id' => 10,
				'purchase_id' => 132,
				'procedure_id' => 6,
				'branch_id' => 1,
				'amount' => 2,
				'show_report' => 1,
				'created_at' => '2016-01-08 15:32:15',
				'updated_at' => '2016-01-08 15:32:15',
				'created_by' => 1,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'bill_id' => 1,
				'item_id' => 10,
				'package_id' => 10,
				'purchase_id' => 132,
				'procedure_id' => 6,
				'branch_id' => 1,
				'amount' => 2,
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

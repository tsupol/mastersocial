<?php

use Illuminate\Database\Seeder;

class ProcedureItemTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('procedure_item')->delete();
        
		\DB::table('procedure_item')->insert(array (
			0 => 
			array (
				'id' => 1,
				'procedure_id' => 31,
				'item_id' => 1,
				'amount' => 1,
				'created_at' => '2015-12-14 08:41:27',
				'updated_at' => '2015-12-14 08:41:27',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'procedure_id' => 5,
				'item_id' => 3,
				'amount' => 1200,
				'created_at' => '2015-12-14 08:41:51',
				'updated_at' => '2015-12-14 08:41:51',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'procedure_id' => 4,
				'item_id' => 3,
				'amount' => 900,
				'created_at' => '2015-12-14 08:42:07',
				'updated_at' => '2015-12-14 08:42:07',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'procedure_id' => 3,
				'item_id' => 3,
				'amount' => 600,
				'created_at' => '2015-12-14 08:42:21',
				'updated_at' => '2015-12-14 08:42:21',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'procedure_id' => 2,
				'item_id' => 3,
				'amount' => 300,
				'created_at' => '2015-12-14 08:42:36',
				'updated_at' => '2015-12-14 08:42:36',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 6,
				'procedure_id' => 1,
				'item_id' => 3,
				'amount' => 225,
				'created_at' => '2015-12-14 08:42:52',
				'updated_at' => '2015-12-14 08:42:52',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 7,
				'procedure_id' => 14,
				'item_id' => 2,
				'amount' => 1,
				'created_at' => '2015-12-14 08:43:11',
				'updated_at' => '2015-12-14 08:43:11',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 8,
				'procedure_id' => 13,
				'item_id' => 2,
				'amount' => 1,
				'created_at' => '2015-12-14 08:43:25',
				'updated_at' => '2015-12-14 08:43:25',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

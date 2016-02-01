<?php

use Illuminate\Database\Seeder;

class PackageProcedureTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('package_procedure')->delete();
        
		\DB::table('package_procedure')->insert(array (
			0 => 
			array (
				'id' => 1,
				'procedure_id' => 2,
				'package_id' => 2,
				'amount' => 1,
				'points' => 0,
				'created_at' => '2015-12-14 07:32:38',
				'updated_at' => '2015-12-14 07:32:38',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'procedure_id' => 3,
				'package_id' => 3,
				'amount' => 1,
				'points' => 0,
				'created_at' => '2015-12-14 07:33:16',
				'updated_at' => '2015-12-14 07:33:16',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'procedure_id' => 4,
				'package_id' => 4,
				'amount' => 1,
				'points' => 0,
				'created_at' => '2015-12-14 08:22:29',
				'updated_at' => '2015-12-14 08:22:29',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'procedure_id' => 5,
				'package_id' => 5,
				'amount' => 1,
				'points' => 0,
				'created_at' => '2015-12-14 08:23:19',
				'updated_at' => '2015-12-14 08:23:19',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

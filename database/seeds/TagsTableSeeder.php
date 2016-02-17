<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tags')->delete();
        
		\DB::table('tags')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'CSL',
				'created_at' => '2016-02-15 21:46:19',
				'updated_at' => '0000-00-00 00:00:00',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'KTB',
				'created_at' => '2016-02-15 21:46:25',
				'updated_at' => '0000-00-00 00:00:00',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'KBANK',
				'created_at' => '2016-02-15 21:46:30',
				'updated_at' => '0000-00-00 00:00:00',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'INTUCH',
				'created_at' => '2016-02-15 21:46:37',
				'updated_at' => '0000-00-00 00:00:00',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'CPALL',
				'created_at' => '2016-02-15 21:46:51',
				'updated_at' => '0000-00-00 00:00:00',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'BEM',
				'created_at' => '2016-02-15 21:47:01',
				'updated_at' => '0000-00-00 00:00:00',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

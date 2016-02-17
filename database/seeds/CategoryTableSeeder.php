<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('category')->delete();
        
		\DB::table('category')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'news',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'business',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

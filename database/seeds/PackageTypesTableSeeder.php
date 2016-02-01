<?php

use Illuminate\Database\Seeder;

class PackageTypesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('package_types')->delete();
        
		\DB::table('package_types')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Promotion ประจำเดือน',
				'created_at' => '2015-12-13 11:18:28',
				'updated_at' => '2015-12-13 11:18:28',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'Promotion',
				'created_at' => '2015-12-13 11:18:39',
				'updated_at' => '2015-12-13 11:18:39',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'Surgery',
				'created_at' => '2015-12-13 11:19:54',
				'updated_at' => '2015-12-13 11:19:54',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'Skin Laser',
				'created_at' => '2015-12-13 11:20:13',
				'updated_at' => '2015-12-13 11:20:13',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'Anti-Aging',
				'created_at' => '2015-12-13 11:20:27',
				'updated_at' => '2015-12-13 11:20:27',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'ยาและเวชสำอาง',
				'created_at' => '2015-12-13 11:20:56',
				'updated_at' => '2015-12-13 11:20:56',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 7,
				'name' => 'Consult',
				'created_at' => '2015-12-14 08:21:08',
				'updated_at' => '2015-12-14 08:21:08',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 8,
				'name' => 'Botox&Filler',
				'created_at' => '2015-12-17 08:30:27',
				'updated_at' => '2015-12-17 08:30:27',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

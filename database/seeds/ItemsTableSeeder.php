<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('items')->delete();
        
		\DB::table('items')->insert(array (
			0 => 
			array (
				'id' => 1,
				'code' => 'IT00001',
				'name' => 'Botox',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:53:21',
				'updated_at' => '2015-12-13 19:53:21',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'code' => 'IT00002',
				'name' => 'Filler',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:53:45',
				'updated_at' => '2015-12-13 19:53:45',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'code' => 'IT00003',
				'name' => 'Thermage',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:53:54',
				'updated_at' => '2015-12-13 19:53:54',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'code' => 'IT00004',
				'name' => 'Meso Fat',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:54:10',
				'updated_at' => '2015-12-13 19:54:10',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'code' => 'IT00005',
				'name' => 'Dysport',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:54:47',
				'updated_at' => '2015-12-13 19:54:47',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			5 => 
			array (
				'id' => 6,
				'code' => 'IT00006',
				'name' => 'Super Aura',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:55:22',
				'updated_at' => '2015-12-13 19:55:22',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			6 => 
			array (
				'id' => 7,
				'code' => 'IT00007',
				'name' => 'Cinderella',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:55:34',
				'updated_at' => '2015-12-13 19:55:34',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			7 => 
			array (
				'id' => 8,
				'code' => 'IT00008',
				'name' => 'CEF-3',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:55:51',
				'updated_at' => '2015-12-13 19:55:51',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			8 => 
			array (
				'id' => 9,
				'code' => 'IT00009',
				'name' => 'Fat Bomb',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:56:03',
				'updated_at' => '2015-12-13 19:56:03',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			9 => 
			array (
				'id' => 10,
				'code' => 'IT00010',
				'name' => 'Hifu',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:56:37',
				'updated_at' => '2015-12-13 19:56:37',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			10 => 
			array (
				'id' => 11,
				'code' => 'IT00011',
				'name' => 'C&B',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:56:51',
				'updated_at' => '2015-12-13 19:56:51',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			11 => 
			array (
				'id' => 12,
				'code' => 'IT00012',
				'name' => 'Endotite',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:57:38',
				'updated_at' => '2015-12-13 19:57:38',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			12 => 
			array (
				'id' => 13,
				'code' => 'IT00013',
				'name' => 'Meso Collagen',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:58:04',
				'updated_at' => '2015-12-13 19:58:04',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			13 => 
			array (
				'id' => 14,
				'code' => 'IT00014',
				'name' => 'Vitamin-C',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:58:50',
				'updated_at' => '2015-12-13 19:58:50',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			14 => 
			array (
				'id' => 15,
				'code' => 'IT00015',
				'name' => 'Sponge',
				'cost' => '0.00',
				'created_at' => '2015-12-13 19:59:31',
				'updated_at' => '2015-12-13 19:59:31',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			15 => 
			array (
				'id' => 16,
				'code' => 'IT00016',
				'name' => 'Jet Peel',
				'cost' => '0.00',
				'created_at' => '2015-12-13 20:00:02',
				'updated_at' => '2015-12-13 20:00:08',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

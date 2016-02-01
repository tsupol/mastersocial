<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('packages')->delete();
        
		\DB::table('packages')->insert(array (
			0 => 
			array (
				'id' => 1,
				'code' => 'PK00001',
				'name' => 'Thermage Eye',
				'cost' => '25000.00',
				'price' => '35000.00',
				'price_vip' => '35000.00',
				'price_marketing' => '35000.00',
				'price_employee' => '35000.00',
				'price_member' => '35000.00',
				'buffet_points' => 0,
				'type_id' => 4,
				'is_buffet' => 0,
				'created_at' => '2015-12-13 11:23:12',
				'updated_at' => '2015-12-13 19:43:51',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'code' => 'PK00002',
				'name' => 'Thermage 300 shot',
				'cost' => '30000.00',
				'price' => '30000.00',
				'price_vip' => '30000.00',
				'price_marketing' => '30000.00',
				'price_employee' => '30000.00',
				'price_member' => '30000.00',
				'buffet_points' => 0,
				'type_id' => 4,
				'is_buffet' => 0,
				'created_at' => '2015-12-14 07:32:38',
				'updated_at' => '2015-12-14 07:32:38',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'code' => 'PK00003',
				'name' => 'Thermage 600 shot',
				'cost' => '55000.00',
				'price' => '55000.00',
				'price_vip' => '55000.00',
				'price_marketing' => '55000.00',
				'price_employee' => '55000.00',
				'price_member' => '55000.00',
				'buffet_points' => 0,
				'type_id' => 4,
				'is_buffet' => 0,
				'created_at' => '2015-12-14 07:33:16',
				'updated_at' => '2015-12-14 07:33:16',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'code' => 'PK00004',
				'name' => 'Thermage 900 shot',
				'cost' => '80000.00',
				'price' => '80000.00',
				'price_vip' => '80000.00',
				'price_marketing' => '80000.00',
				'price_employee' => '80000.00',
				'price_member' => '80000.00',
				'buffet_points' => 0,
				'type_id' => 4,
				'is_buffet' => 0,
				'created_at' => '2015-12-14 08:22:29',
				'updated_at' => '2015-12-14 08:22:29',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			4 => 
			array (
				'id' => 5,
				'code' => 'PK00005',
				'name' => 'Thermage 1200 shot',
				'cost' => '100000.00',
				'price' => '100000.00',
				'price_vip' => '100000.00',
				'price_marketing' => '100000.00',
				'price_employee' => '100000.00',
				'price_member' => '100000.00',
				'buffet_points' => 0,
				'type_id' => 4,
				'is_buffet' => 0,
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

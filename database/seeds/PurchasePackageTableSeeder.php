<?php

use Illuminate\Database\Seeder;

class PurchasePackageTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('purchase_package')->delete();
        
		\DB::table('purchase_package')->insert(array (
			0 => 
			array (
				'id' => 1,
				'purchase_id' => 1,
				'package_id' => 10,
				'price' => '600.00',
				'discount' => '200.00',
				'hn' => 5500300,
				'amount' => 1,
				'created_at' => '2015-12-08 14:28:38',
				'updated_at' => '2015-12-08 14:28:38',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'purchase_id' => 1,
				'package_id' => 1,
				'price' => '1100.00',
				'discount' => '100.00',
				'hn' => 5500300,
				'amount' => 1,
				'created_at' => '2015-12-08 14:28:38',
				'updated_at' => '2015-12-08 14:28:38',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

<?php

use Illuminate\Database\Seeder;

class PurchaseProductTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('purchase_product')->delete();
        
		\DB::table('purchase_product')->insert(array (
			0 => 
			array (
				'id' => 1,
				'purchase_id' => 1,
				'product_id' => 10,
				'price' => '130.00',
				'discount' => '20.00',
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
				'product_id' => 2,
				'price' => '50.00',
				'discount' => '20.00',
				'hn' => 5500300,
				'amount' => 2,
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

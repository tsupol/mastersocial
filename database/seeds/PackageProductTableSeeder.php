<?php

use Illuminate\Database\Seeder;

class PackageProductTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('package_product')->delete();
        
	}

}

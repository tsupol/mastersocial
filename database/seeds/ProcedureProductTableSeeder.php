<?php

use Illuminate\Database\Seeder;

class ProcedureProductTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('procedure_product')->delete();
        
	}

}

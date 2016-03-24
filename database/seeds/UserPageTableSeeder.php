<?php

use Illuminate\Database\Seeder;

class UserPageTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('user_page')->delete();
        
		\DB::table('user_page')->insert(array (
			0 => 
			array (
				'id' => 1,
				'fb_id' => '1031392066904720',
				'page_id' => '919082208176684',
				'page_name' => 'Test',
				'longlive_token' => 'CAACfguwhIVEBADaenwryQTZCGfQhlNUlcS85ecZCbU6FNHf9b4D9N0oq3irDHTeVZBsofBaNu3Acgfzs3ZCq9lCJFYwUkg1xJZCGMQswCr1MwZBTARVSEnBzIKMVBw1QOZCsnuI8rOSbWZB3zAWZADxEcVa0MfDAEFXoZCJLwUHM3b4iUVWwwZAxtkk',
				'created_at' => '2016-03-01 18:55:35',
				'updated_at' => '2016-03-01 18:55:35',
				'actived_at' => '2016-03-01 18:55:35',
				'is_active' => 0,
			),
			1 => 
			array (
				'id' => 2,
				'fb_id' => '1031392066904720',
				'page_id' => '327976304054625',
				'page_name' => 'Memoprint.me',
				'longlive_token' => 'CAACfguwhIVEBAEVyIg2B6yRxjyEaLItCbmhM0ZAr8MIOtkvbs4o5V5duZALtynr2cJwoNEUCEyZAcqWwaitsBZAv3rYk0BQpSZBe7ZBpOxjKNZBsnme1dRIFn0OUlL2XZCbMbOmMtTFfIaClPKszSZA2QBXlNs4BjZBs9ycR59bZBFCJS0H0ih98nEy',
				'created_at' => '2016-03-01 19:27:59',
				'updated_at' => '2016-03-01 19:27:59',
				'actived_at' => '2016-03-01 19:27:59',
				'is_active' => 1,
			),
		));
	}

}

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
				'created_at' => '2016-02-26 18:27:49',
				'updated_at' => '2016-02-26 18:27:49',
				'actived_at' => '2016-02-26 18:27:49',
			),
			1 => 
			array (
				'id' => 2,
				'fb_id' => '1031392066904720',
				'page_id' => '327976304054625',
				'page_name' => 'Memoprint.me',
				'longlive_token' => 'CAACfguwhIVEBAEVyIg2B6yRxjyEaLItCbmhM0ZAr8MIOtkvbs4o5V5duZALtynr2cJwoNEUCEyZAcqWwaitsBZAv3rYk0BQpSZBe7ZBpOxjKNZBsnme1dRIFn0OUlL2XZCbMbOmMtTFfIaClPKszSZA2QBXlNs4BjZBs9ycR59bZBFCJS0H0ih98nEy',
				'created_at' => '2016-02-11 22:32:33',
				'updated_at' => '2016-02-11 22:32:33',
				'actived_at' => '2016-02-11 22:32:33',
			),
		));
	}

}

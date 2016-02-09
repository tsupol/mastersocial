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
				'id' => 2,
				'fb_id' => '1031392066904720',
				'page_id' => '919082208176684',
				'longlive_token' => 'CAACfguwhIVEBAN8equA85ZAoLy5d0W4FoMhht55jAL2tviMq2KX6wvbu4ANMdg4j0P6FNiPuZAmTHJSFFdtQxPZBhnzLYJDWn5copsahODTbCtd42YVwZBNxegE2JqsCtjibz8SP6jj6ZAlgfXPLfvYcb7H0RcBvkztEfiBmav3rZA93iMKRYT',
				'created_at' => '2016-02-04 20:57:35',
				'updated_at' => '2016-02-04 20:57:35',
			),
		));
	}

}

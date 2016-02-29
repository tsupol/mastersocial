<?php

use Illuminate\Database\Seeder;

class FacebookPostTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('facebook_post')->delete();
        
		\DB::table('facebook_post')->insert(array (
			0 => 
			array (
				'id' => 1,
				'post_id' => '919082208176684_940878629330375',
				'post_type' => 'message',
				'category_id' => 1,
				'created_at' => '2016-02-10 21:39:36',
				'updated_at' => '2016-02-10 21:39:36',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'post_id' => '919082208176684_938308306254074',
				'post_type' => 'message',
				'category_id' => 2,
				'created_at' => '2016-02-10 21:40:08',
				'updated_at' => '2016-02-10 21:40:08',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'post_id' => '919082208176684_949723635112541',
				'post_type' => 'link',
				'category_id' => 1,
				'created_at' => '2016-02-26 21:21:32',
				'updated_at' => '2016-02-26 21:21:32',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
			3 => 
			array (
				'id' => 4,
				'post_id' => '919082208176684_919082208176684_949724211779150',
				'post_type' => 'photos',
				'category_id' => 1,
				'created_at' => '2016-02-26 21:23:02',
				'updated_at' => '2016-02-26 21:23:02',
				'created_by' => 0,
				'updated_by' => 0,
				'deleted_by' => 0,
				'deleted_at' => NULL,
			),
		));
	}

}

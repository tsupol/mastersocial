<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fb_id');
			$table->string('name');
			$table->string('remember_token');
			$table->string('email')->unique();
			$table->string('lang', 2)->default('th');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {

			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('f_name');
			$table->string('l_name');
			$table->string('phone', 20);
			$table->string('phone_2', 20)->nullable();
			$table->string('password', 60);

			$table->integer('role_id')->unsigned();
			$table->integer('group_id')->unsigned();
			$table->integer('branch_id')->unsigned();

			$table->string('lang', 2)->default('th');

			$table->rememberToken();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
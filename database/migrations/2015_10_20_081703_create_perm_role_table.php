<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermRoleTable extends Migration {

	public function up()
	{
		Schema::create('perm_role', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('role_id')->unsigned();
			$table->integer('permission_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('perm_role');
	}
}
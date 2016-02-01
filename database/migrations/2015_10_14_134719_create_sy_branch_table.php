<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSyBranchTable extends Migration {

	public function up()
	{
		Schema::create('branches', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50)->unique();
			$table->string('br_email', 100);
			$table->string('br_phone', 20);
			$table->string('br_fax', 20);
			$table->string('br_address', 255);
			$table->string('br_distinct',255);
			$table->string('br_amphur',255);
			$table->string('br_province',255);
			$table->string('br_country_id',255);
			$table->string('br_zipcode',255);
			$table->text('br_desc');
			$table->timestamps() ;
		});
	}

	public function down()
	{
		Schema::drop('branches');
	}
}
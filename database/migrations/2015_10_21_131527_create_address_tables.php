<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_amphur', function(Blueprint $table) {
			$table->increments('amphur_id');
			$table->string('amphur_code');
			$table->string('amphur_name');
			$table->integer('province_id');
		});
		Schema::create('tb_country', function(Blueprint $table) {
			$table->increments('country_id');
			$table->string('country_code');
			$table->string('country_name_en');
			$table->string('country_name_th');
		});
		Schema::create('tb_district', function(Blueprint $table) {
			$table->increments('district_id');
			$table->string('district_code');
			$table->string('district_name');
			$table->integer('amphur_id');
			$table->integer('province_id');
		});
		Schema::create('tb_province', function(Blueprint $table) {
			$table->increments('province_id');
			$table->string('province_code');
			$table->string('province_name');
			$table->integer('country_id');
		});
		Schema::create('tb_zipcode', function(Blueprint $table) {
			$table->increments('ZIPCODE_ID');
			$table->string('DISTRICT_CODE');
			$table->string('PROVINCE_ID');
			$table->string('AMPHUR_ID');
			$table->string('DISTRICT_ID');
			$table->string('ZIPCODE');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_amphur');
		Schema::drop('tb_country');
		Schema::drop('tb_district');
		Schema::drop('tb_province');
		Schema::drop('tb_zipcode');
	}

}

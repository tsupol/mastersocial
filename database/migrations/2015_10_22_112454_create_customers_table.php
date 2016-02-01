<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('f_name', 60);
			$table->string('l_name', 60);
			$table->string('n_name', 60)->nullable();
			$table->string('citizen_id',20)->nullable();// changed
			$table->timestamp('birth_date')->nullable();
			$table->string('address', 255)->nullable();
			$table->string('address_2', 255)->nullable();
//
//			$table->integer('district_id')->default('0');
//			$table->smallInteger('amphur_id')->unsigned();
//			$table->smallInteger('province_id')->unsigned();
//			$table->smallInteger('zipcode_id');
//			$table->smallInteger('country_id')->unsigned()->default('218');

			// -- Address

			$table->string('district', 128)->nullable();
			$table->string('amphur', 128)->nullable();
			$table->smallInteger('province_id')->unsigned();
			$table->string('province', 128)->nullable();
			$table->string('zipcode', 10)->nullable();
			$table->smallInteger('country_id')->unsigned()->default('218');

			// -- END Address

			$table->string('phone', 20);
			$table->string('phone_2', 20)->nullable();
			$table->string('email', 100);
			$table->tinyInteger('gender')->unsigned()->default('0');


			$table->tinyInteger('marriage')->unsigned();
			$table->text('notes');

			$table->string('contact_name',255);
			$table->string('contact_tel',20);

			$table->Integer('customer_level_id')->unsigned()->default('0'); // changed
			$table->text('congenital_disease'); // changed
			$table->text('allergy'); // changed
			$table->text('medication'); // changed
			$table->Integer('know_reason_id')->unsigned()->default('0'); // changed

			$table->timestamps();

			$table->unique( array('f_name','l_name') );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}

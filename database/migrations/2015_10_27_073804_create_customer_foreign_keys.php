<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
//		Schema::table('customer_branch', function(Blueprint $table) {
//			$table->foreign('branch_id')->references('id')->on('branches')
//				->onDelete('restrict')
//				->onUpdate('cascade');
//		});
//
//		Schema::table('customer_branch', function(Blueprint $table) {
//			$table->foreign('customer_id')->references('id')->on('customers')
//				->onDelete('restrict')
//				->onUpdate('cascade');
//		});
//
//		Schema::table('customers', function(Blueprint $table) {
//			$table->foreign('know_reason_id')->references('id')->on('know_reasons')
//				->onDelete('restrict')
//				->onUpdate('cascade');
//		});
//
//		Schema::table('customers', function(Blueprint $table) {
//			$table->foreign('customer_level_id')->references('id')->on('customer_levels')
//				->onDelete('restrict')
//				->onUpdate('cascade');
//		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
//		Schema::table('customer_branch', function(Blueprint $table) {
//			$table->dropForeign('customer_branch_branch_id_foreign');
//		});
//		Schema::table('customer_branch', function(Blueprint $table) {
//			$table->dropForeign('customer_branch_customer_id_foreign');
//		});
//		Schema::table('customers', function(Blueprint $table) {
//			$table->dropForeign('customers_customer_level_id_foreign');
//		});
//		Schema::table('customers', function(Blueprint $table) {
//			$table->dropForeign('customers_know_reason_id_foreign');
//		});
	}

}

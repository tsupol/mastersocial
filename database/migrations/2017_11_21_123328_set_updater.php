<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetUpdater extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public $targets = [
		'customers', 'branches', 'permissions', 'groups', 'customer_levels', 'know_reasons', 'roles', 'users', 'customer_branch',
		'products', 'receipts', 'items','credits',
		'procedures', 'procedure_item', 'procedure_product',
		'packages', 'package_procedure', 'package_product', 'package_types',
		'purchases', 'purchase_product', 'purchase_package',
		'bills','bill_procedure','bill_product','bill_item',
		'departments','procedure_cats',
		'item_branch','product_branch'
	];

	public function up()
	{
		foreach($this->targets as $tableName) {
			Schema::table($tableName, function ($table) {
				// updater
				$table->integer('created_by')->unsigned();
				$table->integer('updated_by')->unsigned();
				$table->integer('deleted_by')->unsigned();
				$table->softDeletes();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		foreach($this->targets as $tableName) {
			Schema::table($tableName, function ($table) {
				$table->dropColumn('created_by', 'updated_by', 'deleted_by', 'deleted_at');
			});
		}
	}

}

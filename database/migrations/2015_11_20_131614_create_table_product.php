<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255)->unique();
			$table->string('code', 7)->unique();
			$table->decimal('cost', 10);
			$table->decimal('price', 10);
			$table->decimal('price_vip', 10);
			$table->decimal('price_marketing', 10);
			$table->decimal('price_employee', 10);
			$table->decimal('price_member', 10);
			$table->smallInteger('use_type')->unsigned();
			$table->timestamps();
		});

		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 7)->unique();
			$table->string('name', 255)->unique();
			$table->decimal('cost', 10);
			$table->timestamps();
		});

		Schema::create('procedures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 7)->unique();
			$table->string('name', 255)->unique();
			$table->decimal('cost', 10);
			$table->decimal('price', 10);
			$table->decimal('price_vip', 10);
			$table->decimal('price_marketing', 10);
			$table->decimal('price_employee', 10);
			$table->decimal('price_member', 10);
			$table->timestamps();
		});

		Schema::create('packages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 7)->unique();
			$table->string('name', 255)->unique();
			$table->decimal('cost', 10);
			$table->decimal('price', 10);
			$table->decimal('price_vip', 10);
			$table->decimal('price_marketing', 10);
			$table->decimal('price_employee', 10);
			$table->decimal('price_member', 10);
			$table->integer('buffet_points')->unsigned(); // buffet
			$table->smallInteger('type_id')->unsigned(); // buffet
			$table->boolean('is_buffet'); // for product / procedure / buffet
			$table->timestamps();
		});

		// -- Specials

//		Schema::create('buffet_package', function(Blueprint $table)
//		{
//			$table->increments('id');
//			$table->string('name', 255);
//			$table->integer('points')->unsigned();
//			$table->integer('package_id')->unsigned();
//			$table->integer('buffet_id')->unsigned();
//			$table->timestamps();
//		});

		// -- Pivots

		Schema::create('procedure_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('procedure_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->timestamps();
		});

		Schema::create('procedure_item', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('procedure_id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->timestamps();
		});

		Schema::create('package_procedure', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('procedure_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->integer('amount')->unsigned()->default(1);
			$table->integer('points')->unsigned();
			$table->timestamps();
		});

		Schema::create('package_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->timestamps();
		});

		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');

			$table->decimal('price', 10);
			$table->decimal('discount', 10);
			$table->integer('customer_id')->unsigned();
			$table->integer('hn')->unsigned();
			$table->integer('sale2_id')->unsigned();  //--- ผู้ช่วยขาย
			$table->integer('sale_id')->unsigned();  //--- ผู้ขาย
			$table->integer('doctor_id')->unsigned();  //--- หมอผู้ดูแล
			$table->integer('status')->unsigned();  //--- (1: complete , 0 : ค้างจ่าย )
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});

		Schema::create('purchase_package', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('purchase_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->decimal('price', 10);
			$table->decimal('discount', 10);
			$table->integer('customer_id')->unsigned();
			$table->integer('hn')->unsigned(); // redundant for billing page
			$table->integer('amount')->unsigned();
			$table->boolean('is_refund')->default(false);
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});

		Schema::create('purchase_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('purchase_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->decimal('price', 10);
			$table->decimal('discount', 10);
			$table->integer('customer_id')->unsigned();
			$table->integer('hn')->unsigned(); // redundant for billing page
			$table->integer('amount')->unsigned();
			$table->boolean('is_refund')->default(false);
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});

		Schema::create('receipts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 45)->unique();
			$table->decimal('cash', 10);
			$table->decimal('credit', 10);
			$table->decimal('transfer', 10);
			$table->decimal('total', 10);
//			$table->smallinteger('payment_type')->unsigned(); // [ 1: cash, 2: credit, 3: transfer ]
			$table->smallinteger('action_type')->unsigned(); // [ 1: complete, 2: deposit, 3: last deposit ]
			$table->integer('purchase_id')->unsigned();
			$table->integer('status')->unsigned();
			$table->string('note');
			$table->boolean('show_report')->default(true);
			$table->timestamps();

			// to do
		});

		Schema::create('bills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 9)->unique();
			$table->integer('purchase_id')->unsigned();   //--- ไม่มีการเก็บค่า เพราะ ต้องสร้างบิลก่อน ค่อย loop package ไป insert bill procedure
			$table->integer('customer_id')->unsigned();
			$table->integer('hn')->unsigned();
			$table->integer('branch_id')->unsigned();
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});

		// *** Bill Action

		Schema::create('bill_package', function(Blueprint $table)
		{
			//--- ไม่ได้ใช้
			$table->increments('id');
			$table->integer('bill_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('package_id')->unsigned();
			// -- usage
			$table->boolean('show_report')->default(true);
			$table->integer('amount')->unsigned(); // to do - its product not package
			$table->timestamps();
		});
		Schema::create('bill_item', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bill_id')->unsigned();
			$table->integer('item_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('procedure_id')->unsigned();
			$table->integer('branch_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->boolean('show_report')->default(true);

			$table->timestamps();
		});
		Schema::create('bill_product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bill_id')->unsigned();
			$table->integer('product_id')->unsigned();

			$table->integer('package_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('procedure_id')->unsigned();
			$table->integer('branch_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});
		Schema::create('bill_procedure', function(Blueprint $table)
		{
					$table->increments('id');
					$table->integer('bill_id')->unsigned();
					$table->integer('package_id')->unsigned();
					$table->integer('purchase_id')->unsigned();
					$table->integer('procedure_id')->unsigned();
					$table->integer('branch_id')->unsigned();
					$table->integer('points')->unsigned();
					$table->integer('amount')->unsigned();
					$table->boolean('show_report')->default(true);
					$table->timestamps();
		});

		// *** Bill Action

		Schema::create('bill_action', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bill_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('procedure_id')->unsigned();
			$table->integer('amount')->unsigned();
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});

		Schema::create('package_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->timestamps();
		});

		Schema::create('credits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('receipt_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('customer_id')->unsigned();
			$table->integer('package_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('hn')->unsigned();
			$table->decimal('cash', 10);
			$table->decimal('credit', 10);
			$table->decimal('transfer', 10);
			$table->decimal('total', 10);
			$table->boolean('show_report')->default(true);
			$table->timestamps();
		});

		Schema::create('refunds', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned();
			$table->decimal('amount', 10);
			$table->text('desc');
			$table->timestamps();
			// to do
		});

		Schema::create('departments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');

			$table->timestamps();
		});

		Schema::create('procedure_cats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('department_id')->unsigned();      //--- 1 old customer , 2 new customer
			$table->string('name');

			$table->timestamps();
		});


		Schema::create('report_department', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned();      //--- 1 old customer , 2 new customer
			$table->integer('department_id')->unsigned();
			$table->integer('procedure_cat_id')->unsigned();
			$table->integer('doctor_id')->unsigned();		//--- doctor role
			$table->integer('channel')->unsigned();		 //---  ช่องทาง 1 Call Centre, 2  Facebook, 3 Instagram,4  Email, 5 Youtube,6 Walk-in
			$table->integer('type')->unsigned();		//--- 1 สอบถามราคา 2 complaint 3 จองคิว 4 ข้อมูลหัตถการ
			$table->text('notes');

			$table->string('name');
			$table->string('phone');
			$table->string('email');
			$table->string('line');
			$table->string('facebook');
			$table->timestamps();
		});


		Schema::create('product_branch', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('branch_id')->unsigned();
			$table->integer('amount') ;  //---   + , -
			$table->timestamps();
		});
		Schema::create('item_branch', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('item_id')->unsigned();
			$table->integer('branch_id')->unsigned();
			$table->integer('amount') ;  //---   + , -
			$table->timestamps();
		});



	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_branch');
		Schema::drop('product_branch');
		Schema::drop('departments');
		Schema::drop('procedure_cats');
		Schema::drop('report_department');

		Schema::drop('refunds');
		Schema::drop('credits');
		Schema::drop('bill_procedure');
		Schema::drop('bill_item');

		Schema::drop('bill_product');
		Schema::drop('bill_action');
		Schema::drop('bill_package');
		Schema::drop('bills');
		Schema::drop('receipts');

		Schema::drop('purchases');
		Schema::drop('purchase_package');
		Schema::drop('purchase_product');

		Schema::drop('packages');
		Schema::drop('package_types');
		Schema::drop('package_procedure');
		Schema::drop('package_product');

		Schema::drop('procedures');
		Schema::drop('procedure_item');
		Schema::drop('procedure_product');

		Schema::drop('products');
		Schema::drop('items');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
//		Schema::table('perm_role', function(Blueprint $table) {
//			$table->foreign('role_id')->references('id')->on('roles')
//						->onDelete('restrict')
//						->onUpdate('cascade');
//		});
//		Schema::table('perm_role', function(Blueprint $table) {
//			$table->foreign('permission_id')->references('id')->on('permissions')
//						->onDelete('restrict')
//						->onUpdate('cascade');
//		});
	}

	public function down()
	{
//		Schema::table('perm_role', function(Blueprint $table) {
//			$table->dropForeign('perm_role_role_id_foreign');
//		});
//		Schema::table('perm_role', function(Blueprint $table) {
//			$table->dropForeign('perm_role_permission_id_foreign');
//		});
	}
}
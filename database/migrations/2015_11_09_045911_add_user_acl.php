<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAcl extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Agregados los campos para el ACL y un campo para verificar si el usuario es administrador
		Schema::table('users', function ($table) {
			$table->boolean('admin')->default(false);
			$table->text('acl');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Remover las columnas para el ACL y el bit de administrador
		Schema::table('users', function ($table) {
			$table->dropColumn('admin');
			$table->dropColumn('acl');
		});
	}
}

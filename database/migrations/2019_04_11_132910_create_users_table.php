<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 20);
			$table->string('prenom', 20);
			$table->string('email', 20);
			$table->string('telephone', 10)->nullable();
			$table->string('password', 100)->nullable();
			$table->integer('fonction_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupeUserTable extends Migration {

	public function up()
	{
		Schema::create('groupe_user', function(Blueprint $table) {
			$table->integer('groupe_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('groupe_user');
	}
}
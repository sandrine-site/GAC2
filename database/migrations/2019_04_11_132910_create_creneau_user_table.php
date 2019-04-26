<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreneauUserTable extends Migration {

	public function up()
	{
		Schema::create('creneau_user', function(Blueprint $table) {
			$table->integer('creneau_id')->unsigned();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('creneau_user');
	}
}
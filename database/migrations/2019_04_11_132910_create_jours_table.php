<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJoursTable extends Migration {

	public function up()
	{
		Schema::create('jours', function(Blueprint $table) {
			$table->increments('id');
			$table->string('jour');
		});
	}

	public function down()
	{
		Schema::drop('jours');
	}
}
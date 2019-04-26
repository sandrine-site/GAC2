<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesAutorisationsTable extends Migration {

	public function up()
	{
		Schema::create('typesAutorisations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 20);
		});
	}

	public function down()
	{
		Schema::drop('typesAutorisations');
	}
}
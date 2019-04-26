<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesRqsTable extends Migration {

	public function up()
	{
		Schema::create('typesRqs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 50)->default('null');
		});
	}

	public function down()
	{
		Schema::drop('typesRqs');
	}
}
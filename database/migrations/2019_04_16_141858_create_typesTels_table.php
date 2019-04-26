<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypesTelsTable extends Migration {

	public function up()
	{
		Schema::create('typesTels', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 20)->default('null');
		});
	}

	public function down()
	{
		Schema::drop('typesTels');
	}
}
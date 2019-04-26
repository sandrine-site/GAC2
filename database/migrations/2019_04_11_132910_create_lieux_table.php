<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLieuxTable extends Migration {

	public function up()
	{
		Schema::create('lieux', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('lieux');
	}
}
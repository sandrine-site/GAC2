<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelephonesTable extends Migration {

	public function up()
	{
		Schema::create('telephones', function(Blueprint $table) {
			$table->increments('id');
			$table->string('numero', 10)->default('0');
			$table->integer('adherent_id')->unsigned();
			$table->integer('typeTel_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('telephones');
	}
}
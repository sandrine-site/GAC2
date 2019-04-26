<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAutorisationsTable extends Migration {

	public function up()
	{
		Schema::create('autorisations', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('ok')->default(0);
			$table->integer('typeAuto_id')->unsigned();
			$table->integer('adherent_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('autorisations');
	}
}
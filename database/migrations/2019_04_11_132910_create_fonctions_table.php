<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFonctionsTable extends Migration {

	public function up()
	{
		Schema::create('fonctions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fonction', 20);
		});
	}

	public function down()
	{
		Schema::drop('fonctions');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnneesScolairesTable extends Migration {

	public function up()
	{
		Schema::create('anneesScolaires', function(Blueprint $table) {
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('anneesScolaires');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLicencesTable extends Migration {

	public function up()
	{
		Schema::create('licences', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('numLicence');
			$table->date('DateLicence');
			$table->integer('adherent_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('licences');
	}
}
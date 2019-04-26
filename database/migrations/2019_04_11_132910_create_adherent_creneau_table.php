<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdherentCreneauTable extends Migration {

	public function up()
	{
		Schema::create('adherent_creneau', function(Blueprint $table) {
			$table->integer('adherent_id')->unsigned();
			$table->integer('crenaux_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('adherent_creneau');
	}
}
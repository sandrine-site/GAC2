<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCreneauxTable extends Migration {

	public function up()
	{
		Schema::create('creneaux', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('heure_debut');
			$table->integer('min_debut')->default('0');
			$table->integer('duree');
			$table->integer('lieu_id')->unsigned();
			$table->integer('jour_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('creneaux');
	}
}
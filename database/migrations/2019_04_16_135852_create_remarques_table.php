<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRemarquesTable extends Migration {

	public function up()
	{
		Schema::create('remarques', function(Blueprint $table) {
			$table->increments('id');
			$table->text('remarque');
			$table->integer('typeRq_id')->unsigned();
			$table->integer('adherent_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('remarques');
	}
}
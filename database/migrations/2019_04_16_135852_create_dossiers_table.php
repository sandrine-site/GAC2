<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDossiersTable extends Migration {

	public function up()
	{
		Schema::create('dossiers', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('certifMedical')->default(0);
			$table->boolean('photo');
			$table->boolean('autorisationsRendues')->default(0);
			$table->boolean('payementOk')->default(0);
			$table->boolean('aidesSociales')->default(0);
			$table->integer('adherent_id')->unsigned();
			$table->boolean('recuDemande')->nullable()->default(0);
		});
	}

	public function down()
	{
		Schema::drop('dossiers');
	}
}
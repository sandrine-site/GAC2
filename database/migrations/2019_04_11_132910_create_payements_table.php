<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayementsTable extends Migration {

	public function up()
	{
		Schema::create('payements', function(Blueprint $table) {
			$table->increments('id');
			$table->decimal('montant')->nullable()->default('0');
			$table->date('encaisseMois')->nullable();
			$table->string('numCheque', 20)->nullable()->default('0');
			$table->integer('adherent_id')->unsigned();
			$table->integer('moyensPayement_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('payements');
	}
}
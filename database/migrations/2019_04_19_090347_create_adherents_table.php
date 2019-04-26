<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdherentsTable extends Migration {

	public function up()
	{
		Schema::create('adherents', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom', 50);
			$table->string('prenom', 50);
			$table->string('lieuNaissance', 50)->default('null');
			$table->date('dateNaissance');
			$table->string('sexe', 10)->default('Fille');
			$table->text('adresse');
			$table->string('ville', 50)->nullable();
			$table->string('cp', 50);
			$table->string('email1', 100);
			$table->string('email2', 100)->default('null');
			$table->string('nomUrgence', 100);
			$table->decimal('nbHeure')->default('0');
			$table->boolean('minibus')->default(0);
			$table->integer('groupe_id')->unsigned();
			$table->integer('tarif_id')->unsigned();
			$table->string('section_id');
		});
	}

	public function down()
	{
		Schema::drop('adherents');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTarifsTable extends Migration {

	public function up()
	{
		Schema::create('tarifs', function(Blueprint $table) {
			$table->increments('id');
			$table->string('libele', 20)->nullable();
			$table->decimal('prix')->nullable();
			$table->date('anneeMini')->nullable();
			$table->date('anneeMaxi')->nullable();
			$table->integer('section_id')->unsigned();
			$table->decimal('temps');
		});
	}

	public function down()
	{
		Schema::drop('tarifs');
	}
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoyensPayementsTable extends Migration {

	public function up()
	{
		Schema::create('moyensPayements', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 20)->nullable()->default('null');
		});
	}

	public function down()
	{
		Schema::drop('moyensPayements');
	}
}
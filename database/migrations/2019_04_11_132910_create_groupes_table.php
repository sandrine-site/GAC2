<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupesTable extends Migration {

	public function up()
	{
		Schema::create('groupes', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom')->nullable();
			$table->string('cathegorie', 50)->nullable()->default('null');
		});
	}

	public function down()
	{
		Schema::drop('groupes');
	}
}
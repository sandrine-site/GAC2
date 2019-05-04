<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdherentCreneauTable extends Migration {

	public function up()
	{
		Schema::create('adherent_creneau', function(Blueprint $table) {
			$table->integer('adherent_id')
                ->unsigned()
                ->index();
			$table->foreign('adherent_id')
                ->reference('id')
                ->on('adherents')
               ->onDelete('cascade');
			$table->integer('crenau_id')
                ->unsigned()
            ->index();
			$table->foreign('crenau_id')
               ->reference('id')
                ->on('creneaux')
              ->onDelete('cascade');
			$table->primary(['adherent_id','creneau_id']);
		});
	}

	public function down()
	{
		Schema::drop('adherent_creneau');
	}
}

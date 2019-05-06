<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentCreneauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherent_creneau', function (Blueprint $table) {
            $table->integer('adherent_id')
                ->unsigned()
                ->index();
            $table->foreign('adherent_id')
                ->reference('id')
                ->on('creneaux')
                ->onDelete('cascade');
            $table->integer('creneau_id')
            ->unsigned()
            ->index();
            $table->foreign('creneau_id')->reference('id')->on ('adherents')->onDelete('cascade');
            $table->primary(['adherent_id','creneau_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adherent_section');
    }
}

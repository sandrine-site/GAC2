<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('fonction_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('creneaux', function(Blueprint $table) {
			$table->foreign('lieu_id')->references('id')->on('lieux')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('creneaux', function(Blueprint $table) {
			$table->foreign('jour_id')->references('id')->on('jours')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('creneau_user', function(Blueprint $table) {
			$table->foreign('creneau_id')->references('id')->on('creneaux')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('creneau_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('groupes', function(Blueprint $table) {
			$table->foreign('section_id')->references('id')->on('sections')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('telephones', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('telephones', function(Blueprint $table) {
			$table->foreign('typeTel_id')->references('id')->on('typesTels')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('remarques', function(Blueprint $table) {
			$table->foreign('typeRq_id')->references('id')->on('typesRqs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('remarques', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('autorisations', function(Blueprint $table) {
			$table->foreign('typeAuto_id')->references('id')->on('typesAutorisations')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('autorisations', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('groupes_users', function(Blueprint $table) {
			$table->foreign('groupe_id')->references('id')->on('groupes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('groupes_users', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('adherents', function(Blueprint $table) {
			$table->foreign('groupe_id')->references('id')->on('groupes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('adherents', function(Blueprint $table) {
			$table->foreign('tarif_id')->references('id')->on('tarifs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('adherent_creneau', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('adherent_creneau', function(Blueprint $table) {
			$table->foreign('crenaux_id')->references('id')->on('creneaux')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('payements', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('payements', function(Blueprint $table) {
			$table->foreign('moyensPayement_id')->references('id')->on('moyensPayements')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('licences', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('dossiers', function(Blueprint $table) {
			$table->foreign('adherent_id')->references('id')->on('adherents')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_fonction_id_foreign');
		});
		Schema::table('creneaux', function(Blueprint $table) {
			$table->dropForeign('creneaux_lieu_id_foreign');
		});
		Schema::table('creneaux', function(Blueprint $table) {
			$table->dropForeign('creneaux_jour_id_foreign');
		});
		Schema::table('creneau_user', function(Blueprint $table) {
			$table->dropForeign('creneau_user_creneau_id_foreign');
		});
		Schema::table('creneau_user', function(Blueprint $table) {
			$table->dropForeign('creneau_user_user_id_foreign');
		});
		Schema::table('groupes', function(Blueprint $table) {
			$table->dropForeign('groupes_section_id_foreign');
		});
		Schema::table('telephones', function(Blueprint $table) {
			$table->dropForeign('telephones_adherent_id_foreign');
		});
		Schema::table('telephones', function(Blueprint $table) {
			$table->dropForeign('telephones_typeTel_id_foreign');
		});
		Schema::table('remarques', function(Blueprint $table) {
			$table->dropForeign('remarques_typeRq_id_foreign');
		});
		Schema::table('remarques', function(Blueprint $table) {
			$table->dropForeign('remarques_adherent_id_foreign');
		});
		Schema::table('autorisations', function(Blueprint $table) {
			$table->dropForeign('autorisations_typeAuto_id_foreign');
		});
		Schema::table('autorisations', function(Blueprint $table) {
			$table->dropForeign('autorisations_adherent_id_foreign');
		});
		Schema::table('groupe_user', function(Blueprint $table) {
			$table->dropForeign('groupe_user_groupe_id_foreign');
		});
		Schema::table('groupe_user', function(Blueprint $table) {
			$table->dropForeign('groupe_user_user_id_foreign');
		});
		Schema::table('adherents', function(Blueprint $table) {
			$table->dropForeign('adherents_groupe_id_foreign');
		});
		Schema::table('adherents', function(Blueprint $table) {
			$table->dropForeign('adherents_tarif_id_foreign');
		});
		Schema::table('adherent_creneau', function(Blueprint $table) {
			$table->dropForeign('adherent_creneau_adherent_id_foreign');
		});
		Schema::table('adherent_creneau', function(Blueprint $table) {
			$table->dropForeign('adherent_creneau_crenaux_id_foreign');
		});
		Schema::table('payements', function(Blueprint $table) {
			$table->dropForeign('payements_adherent_id_foreign');
		});
		Schema::table('payements', function(Blueprint $table) {
			$table->dropForeign('payements_moyensPayement_id_foreign');
		});
		Schema::table('licences', function(Blueprint $table) {
			$table->dropForeign('licences_adherent_id_foreign');
		});
		Schema::table('dossiers', function(Blueprint $table) {
			$table->dropForeign('dossiers_adherent_id_foreign');
		});
	}
}

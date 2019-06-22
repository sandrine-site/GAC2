<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('adherent/index',function () {
  return view('adherent.index');});
Route::get('adherent.confirm', function () {
  return view('adherent.confirm');
});


/*Pages connectées*/
Route::resource('user', 'UserController');
Route::resource('accueilAdmin','accueilAdminController');


/* Pages non Authentifiées*/
/* page du front office*/
Route::get('/', function () {
  return view('Accueil');
})->name('accueil');

Route::get('/pilates', function () {
  return view('front.Pilates');
})->name('pilates');

Route::get('/baby', function () {
  return view('front.Baby');
})->name('baby');
Route::get('/zumba', function () {
  return view('front.Zumba');
})->name('zumba');
Route::get('/adulte', function () {
  return view('front.Adulte');
})->name('adulte');


/*Page d'autentification*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test-mail', function () {
 Mail::raw('bonjour', function ($message) {

         $message->to('test@example.org', 'John Doe');
         $message->subject('test');
     });

});

/*Page accueil administration*/

Route::get('/AdminEdit','HomeController@edit')
->middleware('auth')
->name('accueilAdminEdit');

/*  Adherent Controller*/
Route::get('/adherent/create','AdherentController@create')->name('adherent.create');
Route::post('/adherent', 'AdherentController@store')->name('adherent.store');
Route::get('/adherent/edit','AdherentController@edit')->name('adherent.edit');
Route::get('/adherent/updateGroupe','AdherentController@updateGroupe')->name('adherent.updateGroupe');
Route::get('/adherent','AdherentController@index')->name('adherent.index');
Route::get('/adherent/updateDocument','AdherentController@updateDocument')->name('adherent.updateDocument');
Route::put('/adherent/{adherent}', 'AdherentController@update')->name('adherent.update');
Route::get('/adherent/createAdulte','AdherentController@createAdulte')->name('adherent.createAdulte');
Route::delete('/adherent/{adherent}','AdherentController@destroy')
->middleware('grand')
->name('adherent.destroy');

/*  AdherentAdulte Controller*/
Route::get('/adherentAdulte/create','AdherentAdulteController@create')->name('adherentAdulte.create');
Route::post('/adherentAdulte', 'AdherentAdulteController@store')->name('adherentAdulte.store');
Route::get('/adherentAdulte/edit','AdherentAdulteController@edit')->name('adherentAdulte.edit');
Route::get('/adherentAdulte','AdherentAdulteController@index')->name('adherentAdulte.index');
Route::get('/adherentAdulte/createAdulte','AdherentAdulteController@createAdulte')->name('adherentAdulte.createAdulte');

/*AdherentRepartitionController*/
Route::get('/adherent/Repartition', 'AdherentRepartitionController@indexRepartition')->name('adherent.indexRepartition');
Route::post('/AdherentRepartitionController/updateRepartition','AdherentRepartitionController@updateRepartition')->name('adherent.updateRepartition');
Route::post ('/ByGroup','AdherentRepartitionController@editByGroup')->name('adherent.editByGroup');
Route::post ('/BySection','AdherentRepartitionController@editBySection')->name('adherent.editBysection');
Route::post ('/ByEntraineur','AdherentRepartitionController@editByEntraineur')->name('adherent.editByEntraineur');
Route::post ('/ByCreneau','AdherentRepartitionController@editByCreneau')->name('adherent.editByCreneau');

/*Année Scolaire Controller*/
Route::get('/anneeScolaire','AnneeScolaireController@index')
->middleware('grand')
->name('anneeScolaire.index');
Route::post('/anneeScolaire','AnneeScolaireController@store')
->middleware('grand')
->name('anneeScolaire.store');
Route::get('/anneeScolaire/create','AnneeScolaireController@create')
  ->middleware('grand')
  ->name('anneeScolaire.create');
Route::delete('/anneeScolaire','AnneeScolaireController@destroy')
->middleware('grand')
->name('anneeScolaire.destroy');

/*Creneaux Controller*/
Route::get('/creneau','CreneauController@index')->name('creneau.index');
Route::post('/creneau','CreneauController@store')->name('creneau.store');
Route::get('/creneau/create','CreneauController@create')->name('creneau.create');
Route::delete('/creneau/{creneau}','CreneauController@destroy')->name('creneau.destroy');
Route::get('/creneau/{creneau}/edit', 'CreneauController@edit')->name('creneau.edit');
Route::post('/dossier/{creneau}/update','CreneauController@update')->name('creneau.update');

/*DossierController*/
Route::get('/dossier','DossierController@index')->name('dossier.index');
Route::post('/dossier','DossierController@store')->name('dossier.store');
Route::get('/dossier/{dossier}/edit','DossierController@edit')->name('dossier.edit');
Route::post('/dossier/update','DossierController@update')->name('dossier.update');

/*Autorisation Constroller*/
Route::get('/autorisation','AutorisationController@index')->name('autorisation.index');
Route::post('/autorisation/updateAll','AutorisationController@updateAll')->name('autorisation.updateAll');
/*FonctionController*/
Route::get('/fonction','FonctionController@index')->name('fonction.index');

/*PayementController*/
Route::post('/payement','PayementController@store')->name('payement.store');
Route::get('/payement','PayementController@index')->name('payement.index');
Route::post('/payement/update','PayementController@update')->name('payement.update');
Route::get('/payement/{payement}/{adherent}','PayementController@destroy')->name('payement.destroy');

/*GroupeController*/
Route::get('/groupe','GroupeController@index')->name('groupe.index');
Route::post('/groupe','GroupeController@store')->name('groupe.store');
Route::put('/groupe/{groupe?}','GroupeController@update')->name('groupe.update');
Route::get('/groupe/{groupe}/edit','GroupeController@edit')->name('groupe.edit');
Route::delete('/groupe/{groupe}','GroupeController@destroy')->name('groupe.destroy');

/*SectionController*/
Route::get('/section','SectionController@index')->name('section.index');
Route::post('/section','SectionController@store')->name('section.store');
Route::delete('/section/{section}','sectionController@destroy')->name('section.destroy');

/*UserController*/
Route::get('/user','UserController@index')->name('user.index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::get('/user/{user}/edit','UserController@edit')->name('user.edit');
Route::put('/user/{user}','UserController@update')->name('user.update');
Route::delete('/user/{user}','UserController@destroy')->name('user.destroy');

/*TarifsController*/
Route::get('/tarif','TarifController@index')->name('tarif.index');
Route::post('/tarif/{tarif?}/update','TarifController@update')->name('tarif.update');
Route::post('/tarif','TarifController@store')->name('tarif.store');
Route::delete('/tarif/{tarif}','TarifController@destroy')->name('tarif.destroy');
Route::get('/tarif/calcul','TarifController@calcul')->name('tarif.calcul');
Route::post('/tarif/calcul','TarifController@calcul')->name('tarif.calcul');
/*Update adherent Controller*/
Route::put('updateAdherent','GroupeController@updateAdherent')->name('groupe.updateAdherent');
/*autorisationControleir*/
Route::get('update','AutorisationController@update')->name('autorisation.update');

/* Envois de Mail*/
Route::get('/contact','AdherentContactController@index')->name('contact.index');
Route::put('/contact/mail','AdherentContactController@create')->name('contact.create');
Route::get('/contact/contact','AdherentContactController@contact')->name('contact.send');
//essaies
Route::get('/test', function () {
  return view('test');
});

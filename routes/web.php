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

//Route::get('adherent/index',function () {
//    return view('adherent.index');});
Route::get('adherent.confirm', function () {
    return view('adherent.confirm');
});


/*Pages connectées*/
Route::resource('user', 'UserController');
Route::resource('accueilAdmin','accueilAdminController');



//Route::get('/adherent/edit/{filtre?}/{valeur?}', function () {

//});
// rendre les parametres optionels avec? apres? avec des paramettres o
//Route::middleware('administrateur')->group(function () {
//    Route::resource ('section', 'SectionController',[ 'except'=>['create','show','edit','update']]);
//    });
//Route::middleware('grand')->group(function () {
//    Route::resource ('section', 'SectionController',[ 'except'=>['create','show','edit','update']]);
//});
//Route::middleware('administrateur')->group(function () {
//    Route::resource ('category', 'CategoryController', [
//        'except' => 'show'
//    ]);});

/* Pages non Authentifiées*/
/* page d'Accueil*/
Route::get('/', function () {
    return view('Accueil');
});

/*Page d'autentification*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*  Adherent Controller*/
Route::get('/adherent/create','AdherentController@create')->name('adherent.create');
Route::post('/adherent', 'AdherentController@store')->name('adherent.store');
Route::get('/adherent/edit','AdherentController@edit')->name('adherent.edit');
Route::get('/adherent/updateGroupe','AdherentController@updateGroupe')->name('adherent.updateGroupe');
Route::get('/adherent','AdherentController@index')->name('adherent.index');
Route::get('/adherent/updateDocument','AdherentController@updateDocument')->name('adherent.updateDocument');
Route::put('/adherent/{adherent}', 'AdherentController@update')->name('adherent.update');

/*Année Scolaire Controller*/
Route::get('/anneeScolaire','AnneeScolaireController@index')->name('anneeScolaire.index');
Route::post('/anneeScolaire','AnneeScolaireController@store')->name('anneeScolaire.store');
Route::get('/anneeScolaire/create','AnneeScolaireController@create')->name('anneeScolaire.create');

/*Creneaux Controller*/
Route::get('/creneau','CreneauController@index')->name('creneau.index');
Route::post('/creneau','CreneauController@store')->name('creneau.store');
Route::get('/creneau/create','CreneauController@create')->name('creneau.create');
Route::delete('/creneau/{creneau}','CreneauController@destroy')->name('creneau.destroy');
Route::get('/creneau/{creneau}/edit', 'CreneauController@edit')->name('creneau.edit');


/*DossierController*/
Route::get('/dossier','DossierController@index')->name('dossier.index');
Route::post('/dossier','DossierController@store')->name('dossier.store');
Route::get('/dossier/{dossier}/edit','DossierController@edit')->name('dossier.edit');
Route::put('/dossier/{dossier}','DossierController@update')->name('dossier.update');

/*FonctionController*/
Route::get('/fonction','FonctionController@index')->name('fonction.index');

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
Route::get('/user/create','UserController@create')->name('User.create');
Route::get('/user/{user}/edit','UserController@edit')->name('user.edit');
Route::put('/user/{user}','UserController@update')->name('user.update');
Route::delete('/user/{user}','UserController@destroy')->name('user.destroy');

/*Update adherent Controller*/
Route::put('updateAdherent','GroupeController@updateAdherent')->name('groupe.updateAdherent');
/*autorisationControleir*/
Route::get('update','AutorisationController@update')->name('autorisation.update');

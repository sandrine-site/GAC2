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
/* Pages non connecté*/
/* page d'Accueil*/
Route::get('/', function () {
    return view('Accueil');
});

Route::resource('adherent', 'AdherentController',['except'=>['show','delete']]);
//Route::get('adherent/index',function () {
//    return view('adherent.index');});
Route::get('adherent.confirm', function () {
    return view('adherent.confirm');
});

Auth::routes();
/*Page d'autentification*/
Route::get('/home', 'HomeController@index')->name('home');;
/*Pages connectées*/
Route::resource('user', 'UserController');
Route::resource('creneau', 'CreneauController',[ 'except'=>['show','update']]);
Route::resource('groupe', 'GroupeController');
Route::resource('payement', 'PayementController');
Route::resource('section', 'SectionController',[ 'except'=>['create','show','edit','update']]);
Route::resource('tarif', 'TarifController');
Route::resource('anneeScolaire', 'AnneeScolaireController' ,[
    'except'=>['show','edit','update','destroy']]);
Route::resource('fonction','FonctionController');
Route::resource('dossier','DossierController');
Route::post('editAccueil','AccueilAdminController@editAccueil')->name('editAccueil');

Route::put('adherent/{$id}/updateGroupe','AdherentController@updateGroupe')->name('updateGroupe');


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

<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('Tableau');
});
*/
Route::get('/accueil', function () {
    return view('accueil');
});


Route::get('/login', function () {
    return view('login');
});
Route::get('/demande', function () {
    return view('Demande');
});
Route::get('/archive', function () {
    return view('Archive');
});

Route::get('/', 'TraitementController@graph');
Route::get('/demande','TraitementController@nontraite');
Route::get('/archive','TraitementController@traite');
Route::get('/fetch_data','TraitementController@fetch_data');
Route::get('/fetch_data_traite','TraitementController@fetch_data_traite');
Route::post('/info','TraitementController@info');
Route::post('/result','TraitementController@result');
Route::post('/update','TraitementController@update');
Route::post('/changer','TraitementController@changer');
Route::get('/auto','TraitementController@auto');
Route::get('/auto_t','TraitementController@auto_t');
Route::post('/search','TraitementController@search');
Route::post('/connexion','TraitementController@connexion');
Route::post('/checklogin','TraitementController@checklogin');
Route::get('/logout','TraitementController@logout');
Route::post('/search','TraitementController@search');
Route::post('/search_traite','TraitementController@search_traite');


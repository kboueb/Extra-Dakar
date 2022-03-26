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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AnnonceController@index')->name('annonce.index');
Route::get('/ajouter-annonce', 'AnnonceController@create')->name('annonce.create');
Route::post('/ajouter-annonce', 'AnnonceController@store')->name('annonce.store');
Route::post('/rechercher', 'AnnonceController@search')->name('annonce.search');

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

Route::get('/', 'visiteurcontroller@visiteur');
Route::post('/home/search' , 'visiteurcontroller@search');
Route::get('/categorie/{id}' , 'visiteurcontroller@categorie');
Route::get('/details/{id}' , 'visiteurcontroller@details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashborad', 'admincontroller@dashborad')->middleware('auth','admin');
Route::get('/client/dashborad', 'clientcontroller@dashborad')->middleware('auth');


// Route pour le categories
Route::get('/admin/categorie', 'CategorieController@index')->middleware('auth','admin');
Route::get('/admin/categorie/destory/{id}' , 'CategorieController@destory')->middleware('auth','admin');
Route::post('/admin/categorie/store' , 'CategorieController@store')->middleware('auth','admin');
Route::post('/admin/categorie/update' , 'CategorieController@update')->middleware('auth','admin');
Route::get('/editprofil' , 'admincontroller@editprofil')->middleware('auth','admin');
Route::post('/update' , 'admincontroller@update')->middleware('auth','admin');


// Route pour le produits
Route::get('/admin/produit' , 'ProduitController@index')->middleware('auth','admin');
Route::post('/admin/produit/store' , 'ProduitController@store')->middleware('auth','admin');
Route::post('/admin/produit/update' , 'ProduitController@update')->middleware('auth','admin');
Route::get('/admin/produit/destore/{id}' , 'ProduitController@destore')->middleware('auth','admin');

//Route de home 
//Route::get('users/{id}', [UserController::class, 'index'])->name('user.index');


// route des client
Route::get('/client/editprofil' , 'clientcontroller@editprofil')->middleware('auth');
Route::post('/update' , 'clientcontroller@update')->middleware('auth');
Route::post('/client/store' , 'CommandeController@store')->middleware('auth');
Route::get('/client/carte' , 'clientcontroller@carte')->middleware('auth');
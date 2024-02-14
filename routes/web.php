<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','Controller@index')->name('index');
Route::get('product{id}','Controller@product')->name('product');
Route::get('info{id}','Controller@info')->name('info');
Route::get('allProduct','Controller@allProduct')->name('allProduct');
Route::get('research','Controller@research')->name('research');


Route::post('AjouterPanier','PanierController@ajout')->name('ajoutPanier');
Route::get('AfficherPanier','PanierController@afficherPanier')->name('afficherPanier');
Route::get('removeProductFromCart{id}','PanierController@removeProductFromCart')->name('removeProductFromCart');
Route::get('checkout','PanierController@checkout')->name('checkout');

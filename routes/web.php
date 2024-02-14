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



Route::get('admins','AdminController@index')->name('admin.index')->middleware('auth');
Route::get('admins.products','AdminController@products')->name('admin.products')->middleware('auth');
Route::get('admins.brands','AdminController@brands')->name('admin.brands')->middleware('auth');
Route::get('admins.categories','AdminController@categories')->name('admin.categories')->middleware('auth');
Route::get('admins.categories.delete{id}','AdminController@deleteCategory')->name('admin.categories.delete')->middleware('auth');


Route::get('login','AdminController@login')->name('login');
Route::get('logout','AdminController@logout')->name('logout');
Route::post('login','AdminController@signIn')->name('signIn');
Route::get('forgotPassword','AdminController@forgotPassword')->name('forgotPassword');
Route::post('forgotPassword','AdminController@resetPassword')->name('resetPassword');
Route::get('recoverPassword{token}/{id}','AdminController@recoverPassword')->name('recoverPassword');
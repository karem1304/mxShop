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
Route::get('admins.profile','AdminController@profile')->name('admin.profile')->middleware('auth');
Route::post('admins.profile','AdminController@updateProfile')->name('admin.updateProfile')->middleware('auth');
Route::post('admins.password','AdminController@updatepassword')->name('admin.updatepassword')->middleware('auth');
//produit route
Route::get('admin.products{id}','AdminController@products')->name('admin.products')->middleware('auth');//vue principale produit
Route::get('admin.info.product{id}','AdminController@infoProduct')->name('admin.products.info')->middleware('auth');//vue principale produit
Route::post('admin.upload.product{id}','AdminController@upload')->name('admin.products.upload')->middleware('auth');//vue principale produit
Route::get('admin.upload.product{id}','AdminController@deleteUpload')->name('admin.products.deleteUpload')->middleware('auth');//vue principale produit
Route::post('admin.products.add{id}','AdminController@addProduct')->name('admin.products.add')->middleware('auth');//vue principale produit
Route::get('admin.products.delt{id}/{ids}','AdminController@deltProduct')->name('admin.products.delete')->middleware('auth');//vue principale produit
Route::get('admin.products.edit/{id}','AdminController@editProduct')->name('admin.products.edit')->middleware('auth');//vue principale produit
Route::post('admin.products.edit/{id}','AdminController@updateProduct')->name('admin.products.update')->middleware('auth');//vue principale produit

//fin produit route
// Marque route
Route::get('admins.brands','AdminController@brands')->name('admin.brands')->middleware('auth');//vue pricipale marque
Route::get('admins.brands.delete{id}','AdminController@deleteBrand')->name('admin.brands.delete')->middleware('auth'); //supprimer une marque
Route::post('admins.brands.add','AdminController@addBrand')->name('admin.brands.add')->middleware('auth');//ajouter une marque
Route::get('admins.brands.edit{id}','AdminController@editBrand')->name('admin.brands.edit')->middleware('auth');//renvoyer les information de la marque que l'on veut modifier
Route::post('admins.brands.edit{id}','AdminController@updateBrand')->name('admin.brands.update')->middleware('auth');//routes pour modifier la marque
//fin Marque Route

// categorie Route
Route::get('admins.categories','AdminController@categories')->name('admin.categories')->middleware('auth');//index ou vue principale des categories
Route::get('admins.categories.delete{id}','AdminController@deleteCategory')->name('admin.categories.delete')->middleware('auth'); //supprimer une categorie
Route::post('admins.categories.add','AdminController@addCategory')->name('admin.categories.add')->middleware('auth');//ajouter une categorie
Route::get('admins.categories.edit{id}','AdminController@editCategory')->name('admin.categories.edit')->middleware('auth');//renvoyer les information de la categorie que l'on veut modifier
Route::post('admins.categories.edit{id}','AdminController@updateCategory')->name('admin.categories.update')->middleware('auth');//routes pour modifier la categorie
// fin categorie route

Route::get('login','AdminController@login')->name('login');
Route::get('logout','AdminController@logout')->name('logout');
Route::post('login','AdminController@signIn')->name('signIn');
Route::get('forgotPassword','AdminController@forgotPassword')->name('forgotPassword');
Route::post('forgotPassword','AdminController@resetPassword')->name('resetPassword');
Route::get('recoverPassword{token}/{id}','AdminController@recoverPassword')->name('recoverPassword');
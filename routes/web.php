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

// Route::get('/', function () {
//     return view('sitweb.index');
// });

//Sitweb Controller
Route::get('/', 'SitwebController@index');
Route::get('/about', 'SitwebController@about')->name('about');
Route::get('/contact', 'SitwebController@contact');
// Route::get('/b','SitwebController@shop');

//Products Routes
Route::get('/boutique','ProductController@index')->name('products.index');
// Route::get('/product_details', 'ProductController@productDetail');
Route::get('/boutique/{slug}', 'ProductController@showProductDetails')->name('products.show');

Route::get('/detail','ProductController@detail');

//Cart Route
Route::post('/panier/ajouter','CartController@store')->name('cart.store');
Route::get('/mon-panier','CartController@index')->name('cart.index');
Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');

//empty cart
Route::get('/emptyCart', 'SitwebController@emptyCart');

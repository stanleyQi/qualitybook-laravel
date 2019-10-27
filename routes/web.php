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
//route::view('/','home');
route::get('/', 'HomeController@index')->name('home');

//route::view('/booklist','book.booklist');
route::get('/booklist', 'BookController@index')->name('booklist');
route::get('/book/{id}', 'BookController@show')->name('book');

//cart
route::get('/cart', 'CartController@index')->name('cart');
route::post('/cart', 'CartController@store')->name('cart.store');
route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
route::get('/empty', 'CartController@empty')->name('cart.empty');
route::patch('/cart/{id}', 'CartController@update')->name('cart.update');

route::view('/profile', 'customer.profile');

Route::get('/checkout', 'CheckoutController@store')->name('checkout.store')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    // user
    Route::get('/myaccount', 'UserController@show')->name('user.show');
});
